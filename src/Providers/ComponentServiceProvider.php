<?php

namespace Bethuxs\BladeBootstrapComponents\Providers;

use Bethuxs\BladeBootstrapComponents\CountriesHelper;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bs');

        // Configure Flash Messages
        Flash::levels([
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error' => 'alert-danger',
        ]);

        // Use Bootstrap 5 for pagination
        Paginator::useBootstrapFive();

        // Register anonymous components namespace
        Blade::anonymousComponentNamespace('bs::components', 'bs');

        // Share CountriesHelper globally
        Blade::macro('countries', fn() => CountriesHelper::class);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}

