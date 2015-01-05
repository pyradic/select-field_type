<?php namespace Anomaly\SelectFieldType;

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
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.select::input';

    /**
     * Return options available.
     *
     * @return array
     */
    public function getOptions()
    {
        $options = array_get($this->config, 'options', []);

        if ($options instanceof \Closure) {
            $options = app()->call($options);
        }

        foreach ($options as $value => &$title) {

            $options[$value] = [
                'value'    => $value,
                'title'    => trans($title),
                'selected' => ($value == $this->getValue()),
            ];
        }

        return $options;
    }
}
