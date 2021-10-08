<?php

namespace Sameh\LaravelSystem;

use Illuminate\Support\ServiceProvider;
use Sameh\LaravelSystem\Routing\CustomRouting;

class LaravelSystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () {
            return new CustomRouting($this->app['router']);
        });

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laravel-system');
        $this->publishes([
            __DIR__ . '/resources/views' => base_path('resources/views')
        ]);

        $this->publishes([__DIR__ . '/public' => public_path(''),], 'public');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

            $this->publishes([
                __DIR__ . '/database/migrations' => database_path('migrations'),
            ]);

        }
    }

    public function register()
    {
        $this->app->make('Sameh\LaravelSystem\database\seeds\LaravelSystemDatabaseSeeder');
    }

}
