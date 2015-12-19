<?php namespace Anomaly\SelectFieldType;

use Anomaly\SelectFieldType\Command\BuildOptions;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Illuminate\Foundation\Bus\DispatchesJobs;

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

    use DispatchesJobs;

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.select::filter';

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'mode'    => 'dropdown',
        'handler' => 'Anomaly\SelectFieldType\SelectFieldTypeOptions@handle'
    ];

    /**
     * The option handlers.
     *
     * @var array
     */
    protected $handlers = [
        'years'      => 'Anomaly\SelectFieldType\Handler\Years',
        'emails'     => 'Anomaly\SelectFieldType\Handler\Emails',
        'layouts'    => 'Anomaly\SelectFieldType\Handler\Layouts',
        'currencies' => 'Anomaly\SelectFieldType\Handler\Currencies'
    ];

    /**
     * The dropdown options.
     *
     * @var null|array
     */
    protected $options = null;

    /**
     * Get the dropdown options.
     *
     * @return array
     */
    public function getOptions()
    {
        if ($this->options === null) {
            $this->dispatch(new BuildOptions($this));
        }

        $topOptions = array_get($this->getConfig(), 'top_options');

        if (!is_array($topOptions)) {
            $topOptions = array_filter(array_reverse(explode("\r\n", $topOptions)));
        }

        foreach ($topOptions as $key) {
            $this->options = [$key => $this->options[$key]] + $this->options;
        }

        return $this->options;
    }

    /**
     * Set the options.
     *
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the handlers.
     *
     * @return array
     */
    public function getHandlers()
    {
        return $this->handlers;
    }

    /**
     * Get the placeholder.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        return ($this->placeholder !== null) ? $this->placeholder : 'anomaly.field_type.select::input.placeholder';
    }

    /**
     * Return the input view.
     *
     * @return string
     */
    public function getInputView()
    {
        return 'anomaly.field_type.select::' . $this->config('mode', 'dropdown');
    }
}
