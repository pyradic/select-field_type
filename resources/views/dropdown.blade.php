@php
    assets('scripts.js')->add('public::vendor/anomaly/field_type/select/js/index.js');
@endphp

<select-field-type {!! html_attributes([
    'value' => $fieldType->value,
    'name' => $fieldType->input_name,
    'placeholder' => $fieldType->placeholder,
    'options' => json_encode($fieldType->getOptions()),
    // 'slugify' => $fieldType->config('slugify'),
    // 'lowercase' => $fieldType->config('lowercase'),
    // 'replacement' => $fieldType->config('type'), // @todo rename to replacement
]) !!}></select-field-type>
