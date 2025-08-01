<?php
namespace Bethuxs\BladeBootstrapComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use Illuminate\Pagination\Paginator;

class ComponentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bs');
        // for the flash messages
        \Spatie\Flash\Flash::levels([
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error' => 'alert-error',
        ]);

        // change the paginator to use bootstrap 5
        Paginator::useBootstrapFive();

        Blade::anonymousComponentNamespace('bs::components', 'bs');
    }

    public function register()
    {
        //
    }
}
