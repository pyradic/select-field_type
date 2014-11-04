<?php namespace Anomaly\Streams\Addon\FieldType\Select;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class SelectFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Select
 */
class SelectFieldTypePresenter extends FieldTypePresenter
{

    /**
     * Return the value.
     *
     * @return null
     */
    public function value()
    {
        if ($key = $this->resource->getValue()) {

            $options = $this->resource->getOptions();

            if (isset($options[$key])) {

                return $options[$key];
            }
        }

        return null;
    }
}
 