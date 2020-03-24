@php
    assets('scripts.js')->add('public::vendor/anomaly/field_type/select/js/index.js');
@endphp

<select-field-type {!! html_attributes([
    'value' => $fieldType->getValue(),
    'name' => $fieldType->getInputName(),
    'placeholder' => $fieldType->getPlaceholder(),
    'options' => json_encode($fieldType->getOptions()),
    // 'slugify' => $fieldType->config('slugify'),
    // 'lowercase' => $fieldType->config('lowercase'),
    // 'replacement' => $fieldType->config('type'), // @todo rename to replacement
]) !!}></select-field-type>

{{-- <select
        name="{{ field_type.input_name }}"
        {{ html_attributes(field_type.attributes) }}
        {{ field_type.disabled ? 'disabled' }}
        {{ field_type.readonly ? 'readonly' }}>

    {% if field_type.placeholder %}
        <option value="">{{ trans(field_type.placeholder) }}</option>
    {% endif %}

    {% for value, option in field_type.options %}
        {% if option is iterable %}
            <optgroup label="{{ trans(value) }}">
                {% for value, option in option %}
                    <option value="{{ value }}" {{ value == field_type.key ? 'selected' }}>{{ trans(option) }}</option>
                {% endfor %}
            </optgroup>
        {% else %}
            <option value="{{ value }}" {{ value == field_type.key ? 'selected' }}>{{ trans(option) }}</option>
        {% endif %}
    {% endfor %}

</select> --}}
