<?php namespace Anomaly\Streams\Addon\FieldType\Select;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class SelectFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Select
 */
class SelectFieldType extends FieldType
{

    /**
     * Return the input HTML.
     *
     * @return mixed
     */
    public function input()
    {
        return app('form')->select($this->getFieldName(), $this->getOptions(), $this->getValue());
    }

    /**
     * Get the selectable options.
     *
     * @return array
     */
    public function getOptions()
    {
        $options = $this->getConfig('options', [null => 'misc.empty']);

        return $this->translate($options);
    }

    protected function translate($options)
    {
        $translated = [];

        foreach ($options as $key => $option) {

            $translated[trans($key)] = $this->translateOption($option);
        }

        return $translated;
    }

    protected function translateOption($option)
    {
        if (is_string($option)) {

            $option = trans($option);
        }

        if (is_array($option)) {

            foreach ($option as &$value) {

                $value = trans($value);
            }
        }

        return $option;
    }
}
