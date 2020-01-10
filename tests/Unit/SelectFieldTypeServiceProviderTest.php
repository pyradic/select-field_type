<?php

use Anomaly\SelectFieldType\SelectFieldType;
use Anomaly\SelectFieldType\SelectFieldTypeServiceProvider;

class SelectFieldTypeServiceProviderTest extends TestCase
{

    public function testProvides()
    {
        $provider = app(SelectFieldTypeServiceProvider::class, ['app' => app()]);

        $provides = $provider->provides();

        $this->assertTrue(in_array(SelectFieldType::class, $provides));
        $this->assertTrue(in_array('anomaly.field_type.select', $provides));
    }
}
