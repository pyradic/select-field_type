<?php

namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\Command\ParseOptions;
use Anomaly\SelectFieldType\SelectFieldType;

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
        $options = array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = dispatch_now(new ParseOptions($fieldType, $options));
        }

        if ($options instanceof \Closure) {
            $options = app()->call($options, compact('fieldType'));
        }

        $fieldType->setOptions((array) $options);
    }
}
