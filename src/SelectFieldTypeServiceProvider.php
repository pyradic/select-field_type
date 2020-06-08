<?php

namespace Anomaly\SelectFieldType;

use Illuminate\Contracts\Support\DeferrableProvider;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class SelectFieldTypeServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SelectFieldTypeServiceProvider extends AddonServiceProvider implements DeferrableProvider
{

    /**
     * The addon aliases.
     *
     * @var array
     */
    public $aliases = [
        'select' => 'anomaly.field_type.select',
    ];

    /**
     * Return the provided services.
     */
    public function provides()
    {
        return [SelectFieldType::class, 'anomaly.field_type.select', 'select'];
    }
}
