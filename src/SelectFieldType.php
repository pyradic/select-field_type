<?php namespace Anomaly\Streams\Addon\FieldType\Select;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class SelectFieldType extends FieldTypeAddon
{
    protected $slug = 'select';

    /**
     * The database column type this field type uses.
     *
     * @var string
     */
    public $columnType = 'string';

    /**
     * Available field type settings.
     *
     * @var array
     */
    public $settings = array(
        'options',
        'is_multiselect',
    );

    /**
     * Return the input used for forms.
     *
     * @return mixed
     */
    public function input()
    {
        return \Form::select(
            $this->inputName(),
            $this->options(),
            $this->value
        );
    }

    /**
     * Get options as an associative array.
     *
     * @return array
     */
    protected function options()
    {
        // @todo - Return options as associative array here. Don't forget support for optgroups.
    }
}
