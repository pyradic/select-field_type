<?php namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\SelectFieldType;

/**
 * Class Countries
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Countries
{

    /**
     * Handle the options.
     *
     * @param SelectFieldType $fieldType
     */
    public function handle(SelectFieldType $fieldType)
    {
        $fieldType->setOptions(
            array_combine(
                array_keys(config('streams::countries.available')),
                array_map(
                    function ($country) {
                        return 'streams::country.' . $country;
                    },
                    array_keys(config('streams::countries.available'))
                )
            )
        );
    }
}
