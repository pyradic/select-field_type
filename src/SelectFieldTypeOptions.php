<?php

namespace Anomaly\SelectFieldType;

use Anomaly\SelectFieldType\Command\ParseOptions;

/**
 * Class SelectFieldTypeOptions
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SelectFieldTypeOptions
{

    /**
     * Handle the select options.
     *
     * @param  SelectFieldType $fieldType
     */
    public function handle(SelectFieldType $fieldType)
    {
        $options = array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = dispatch_now(new ParseOptions($fieldType, $options));
        }

        if ($options instanceof \Closure) {
            $options = app()->call($options, compact('fieldType'));
        }

        if (is_null($options)) {
            $options = [];
        }

        $fieldType->setOptions(translate($options));
    }
}
