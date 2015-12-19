<?php namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\SelectFieldType;
use Carbon\Carbon;

/**
 * Class Years
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SelectFieldType
 */
class Years
{

    /**
     * Handle the options.
     *
     * @param SelectFieldType $fieldType
     */
    public function handle(SelectFieldType $fieldType)
    {
        $years = [];

        $start = (new Carbon())->createFromTimestamp(strtotime($fieldType->config('start', '-10 years')))->format('Y');
        $end   = (new Carbon())->createFromTimestamp(strtotime($fieldType->config('end', 'now')))->format('Y');

        for ($date = $start; $date <= $end; $date++) {
            $years[$date] = $date;
        }

        if (strtolower($fieldType->config('sort', 'desc')) == 'desc') {
            $years = array_reverse($years);
        }

        $fieldType->setOptions($years);
    }
}
