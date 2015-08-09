<?php namespace Anomaly\SelectFieldType\Command;

use Anomaly\SelectFieldType\SelectFieldType;
use Illuminate\Container\Container;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class BuildOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SelectFieldType\Command
 */
class BuildOptions implements SelfHandling
{

    /**
     * The field type instance.
     *
     * @var SelectFieldType
     */
    protected $fieldType;

    /**
     * Create a new BuildOptions instance.
     *
     * @param SelectFieldType $fieldType
     */
    function __construct(SelectFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Container $container
     */
    public function handle(Container $container)
    {
        $handler = array_get($this->fieldType->getConfig(), 'handler');

        if (is_string($handler) && !str_contains($handler, '@')) {
            $handler .= '@handle';
        }

        $container->call($handler, ['fieldType' => $this->fieldType]);
    }
}
