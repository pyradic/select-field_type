<?php namespace Anomaly\SelectFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class SelectFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SelectFieldType
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
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.select::input';

    /**
     * Get the dropdown options.
     *
     * @return array
     */
    public function getOptions()
    {
        return app()->call('Anomaly\SelectFieldType\SelectFieldTypeOptions@handle', ['fieldType' => $this]);
    }
}
