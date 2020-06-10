<?php

namespace Anomaly\SelectFieldType\Handler;

use Illuminate\Support\Arr;
use Anomaly\SelectFieldType\SelectFieldType;
use Anomaly\SelectFieldType\Command\ParseOptions;

/**
 * Class Options
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Options
{

    /**
     * Handle the select options.
     *
     * @param  SelectFieldType $fieldType
     */
    public function handle(SelectFieldType $fieldType)
    {
        $options = Arr::get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = dispatch_now(new ParseOptions($fieldType, $options));
        }

        if ($options instanceof \Closure) {
            $options = app()->call($options, compact('fieldType'));
        }

        $fieldType->setOptions((array) $options);
    }
}
