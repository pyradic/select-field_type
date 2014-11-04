<?php namespace Anomaly\Streams\Addon\FieldType\Select;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

/**
 * Class SelectFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Select
 */
class SelectFieldType extends FieldTypeAddon
{

    /**
     * Return the input HTML.
     *
     * @return mixed
     */
    public function input()
    {
        $options = [
            'class' => 'form-control',
        ];

        return app('form')->select($this->getFieldName(), $this->getOptions(), $this->getValue(), $options);
    }

    /**
     * Get the selectable options.
     *
     * @return array
     */
    public function getOptions()
    {
        return ['foo' => 'Foo', 'bar' => 'Bar'];
    }
}
