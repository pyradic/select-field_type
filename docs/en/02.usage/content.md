## Usage[](#usage)

This section will show you how to use the field type via API and in the view layer.


### Setting Values[](#usage/setting-values)

You must set the value with a key from the available options:

    $entry->example = "foo";


### Basic Output[](#usage/basic-output)

The addon field type returns the values option key.

    $entry->example; // foo


### Presenter Output[](#usage/presenter-output)

This section will show you how to use the decorated value provided by the `\Anomaly\SelectFieldType\SelectFieldTypePresenter` class.


#### SelectFieldTypePresenter::key()[](#usage/presenter-output/selectfieldtypepresenter-key)

The `key` method returns the selected value's key.

###### Returns: `string`

###### Example

    $decorated->example->key();

###### Twig

    {{ decorated.example.key() }}


#### SelectFieldTypePresenter::value()[](#usage/presenter-output/selectfieldtypepresenter-value)

The `value` method returns the selected value.

###### Returns: `string`

###### Example

    $decorated->example->value();

###### Twig

    {{ decorated.example.value() }}


#### SelectFieldTypePresenter::currency()[](#usage/presenter-output/selectfieldtypepresenter-currency)

The `currency` method returns the currency definition for the selected value when using the `currency` handler.

###### Returns: `array` or `null`

###### Example

    $decorated->example->currency()['symbol'];

###### Twig

    {{ decorated.example.currency().symbol }}
