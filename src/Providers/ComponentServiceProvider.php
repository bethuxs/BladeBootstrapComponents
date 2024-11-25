<?php
namespace Bethuxs\BladeBootstrapComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ComponentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bs');
        Blade::componentNamespace('\\Bethuxs\BladeBootstrapComponents\Components', 'bs');
    }

    public function register()
    {
        //
    }
}
