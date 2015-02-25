# Select Field Type

*anomaly.field_type.select*

#### A dropdown field type.

The select field type provides an HTML select input.

## Configuration

- `handler` - the class string of the options handler
- `options` - an array of key / value options for the dropdown
 
The handler will default to a class packaged with the field type. The select field type supports optgroup organized options as well. The option values are translatable.

#### Example

	config => [
	    'options' => [
	        'foo' => 'Foo',
	        'bar' => 'Bar'
	    ]
	]
