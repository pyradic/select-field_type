<?php namespace Anomaly\SelectFieldType;

use Anomaly\SelectFieldType\Command\ParseOptions;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class SelectFieldTypeOptions
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SelectFieldType
 */
class SelectFieldTypeOptions
{

    use DispatchesJobs;

    /**
     * Handle the select options.
     *
     * @param SelectFieldType $fieldType
     * @return array
     */
    public function handle(SelectFieldType $fieldType, Container $container)
    {
        $options = array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = $this->dispatch(new ParseOptions($options));
        }

        if ($options instanceof \Closure) {
            $options = $container->call($options);
        }

        $fieldType->setOptions($options);
    }
}
