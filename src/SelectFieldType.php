<?php namespace Anomaly\Streams\Addon\FieldType\Select;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class SelectFieldType extends FieldTypeAddon
{
    public function input()
    {
        return \Form::select(
            $this->inputName(),
            $this->options(),
            $this->value
        );
    }
}
