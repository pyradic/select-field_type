<?php namespace Anomaly\SelectFieldType\Command;

use Illuminate\Support\Str;
use Illuminate\Container\Container;
use Anomaly\SelectFieldType\SelectFieldType;

/**
 * Class BuildOptions
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class BuildOptions
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
    public function __construct(SelectFieldType $fieldType)
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

        if (!class_exists($handler) && !Str::contains($handler, '@')) {
            $handler = array_get($this->fieldType->getHandlers(), $handler);
        }

        if (is_string($handler) && !Str::contains($handler, '@')) {
            $handler .= '@handle';
        }

        $container->call($handler, ['fieldType' => $this->fieldType]);
    }
}
