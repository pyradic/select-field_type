# Output

This field type returns an array of selected values by default.

### Key

Return the option key value. In most cases this is the same as the default output.

```
// Twig Usage
{{ entry.example.key }} // Outputs key1

// API usage
echo $entry->example->key; // Outputs key1
```

### Value

Return the selected value.

```
// Twig Usage
{{ entry.example.value }} // Outputs Value 1

// API usage
echo $entry->example->value; // Outputs Value 1
```
