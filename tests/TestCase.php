<?php

namespace Bethuxs\BladeBootstrapComponents\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Bethuxs\BladeBootstrapComponents\Providers\ComponentServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ComponentServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        //
    }
}
