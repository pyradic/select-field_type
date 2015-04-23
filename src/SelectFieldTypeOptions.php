<?php namespace Anomaly\SelectFieldType;

/**
 * Class SelectFieldTypeOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SelectFieldType
 */
class SelectFieldTypeOptions
{

    /**
     * Handle the select options.
     *
     * @param SelectFieldType $fieldType
     * @return array
     */
    public function handle(SelectFieldType $fieldType)
    {
        return [null => trans($fieldType->getPlaceholder())] + array_get($fieldType->getConfig(), 'options', []);
    }
}
