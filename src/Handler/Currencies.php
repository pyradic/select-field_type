<?php namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\SelectFieldType;

/**
 * Class Currencies
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Currencies
{

    /**
     * Handle the options.
     *
     * @param SelectFieldType $fieldType
     */
    public function handle(SelectFieldType $fieldType)
    {
        $currencies = array_values(config('streams::currencies.enabled'));

        $fieldType->setOptions(
            array_combine(
                $currencies,
                $currencies
            )
        );
    }
}
