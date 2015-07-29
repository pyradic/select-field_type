# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'key1' => 'Value 1',
                'key2' => 'Value 2',
                'key3' => 'Value 3'
            ],
            'min'           => 1,
            'max'           => 2,
            'default_value' => 'key2',
            'handler'       => 'Anomaly\SelectFieldType\SelectFieldTypeOptions@handle'
        ]
    ]
];
```

### `options`

The options for the dropdown. Any valid array or valid YAML string can be used.

### `default_value`

The default selection. Any valid value can be used. By default value is `null`.

### `handler`

The options handler callable string. Any valid callable class string can be used. The default value is `'Anomaly\SelectFieldType\SelectFieldTypeOptions@handle'`.

The handler is responsible for setting the available options on the field type instance.

**NOTE:** This option can not be through the GUI configuration. 
