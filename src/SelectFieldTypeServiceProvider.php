<?php

namespace Anomaly\SelectFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

/**
 * Class SelectFieldTypeServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SelectFieldTypeServiceProvider extends AddonServiceProvider implements DeferrableProvider
{

    /**
     * Return the provided services.
     */
    public function provides()
    {
        return [SelectFieldType::class, 'anomaly.field_type.select'];
    }
}
