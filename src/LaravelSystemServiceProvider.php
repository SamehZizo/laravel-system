<?php

namespace Sameh\LaravelSystem;

use Illuminate\Support\ServiceProvider;
use Sameh\LaravelSystem\Routing\CustomRouting;

class LaravelSystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Custom Routing
        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () {
            return new CustomRouting($this->app['router']);
        });

        // Load View Location
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laravel-system');

        // publishes
        $this->publishes([__DIR__ . '/public' => public_path('laravel-system/assets'),], 'public');
        $this->publishes([__DIR__ . '/config' => config_path(),], 'config');

        if ($this->app->runningInConsole()) {
            // Load Migration Location
            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        }
    }

    public function register()
    {
        // Register Seeder
        $this->app->make('Sameh\LaravelSystem\database\seeds\LaravelSystemDatabaseSeeder');
    }

}
