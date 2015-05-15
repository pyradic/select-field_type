<?php namespace Anomaly\SelectFieldType;

use Anomaly\SelectFieldType\Command\ParseOptions;
use Illuminate\Foundation\Bus\DispatchesCommands;

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

    use DispatchesCommands;

    /**
     * Handle the select options.
     *
     * @param SelectFieldType $fieldType
     * @return array
     */
    public function handle(SelectFieldType $fieldType)
    {
        $options = array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = $this->dispatch(new ParseOptions($options));
        }

        return [null => $fieldType->getPlaceholder()] + $options;
    }
}
