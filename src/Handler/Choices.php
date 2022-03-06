<?php namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\Command\ParseOptions;
use Anomaly\SelectFieldType\SelectFieldType;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class Options
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Choices
{

    use DispatchesJobs;

    /**
     * Handle the select options.
     *
     * @param  SelectFieldType $fieldType
     */
    public function handle(SelectFieldType $fieldType, Container $container)
    {

        $choices = array_get($fieldType->getConfig(), 'choices', []);
        $choices['options'] = array_get($fieldType->getConfig(), 'options', []);
        $fieldType->addAttribute('data-choices', json_encode($choices));
    }
}
