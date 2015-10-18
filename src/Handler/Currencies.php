<?php namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\SelectFieldType;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

/**
 * Class Currencies
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SelectFieldType
 */
class Currencies
{

    /**
     * Handle the options.
     *
     * @param SelectFieldType $fieldType
     * @param Repository      $config
     */
    public function handle(SelectFieldType $fieldType, Repository $config)
    {
        $fieldType->setOptions(
            array_combine(
                $config->get('streams::currencies.enabled'),
                $config->get('streams::currencies.enabled')
            )
        );
    }
}
