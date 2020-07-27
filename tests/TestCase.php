<?php

namespace Dhamkith\Googlemap\tests;

use Dhamkith\Googlemap\GooglemapServiceProvider;

class TestCase extends orchestra\testbench\TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            GooglemapServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        //
    }
}
