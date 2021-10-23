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

        // Load Routes Location
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // publishes
        $this->publishes([__DIR__ . '/public' => public_path('laravel-system/assets'),], 'laravel-system');
        $this->publishes([__DIR__ . '/config' => config_path(),], 'laravel-system');

        // login files
        $this->publishes([__DIR__ . '/Controllers/Auth' => app_path('Http/Controllers'),], 'laravel-system');
        $this->publishes([__DIR__ . '/resources/publish/auth' => resource_path('views'),], 'laravel-system');

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
