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

        //$this->loadViewsFrom(__DIR__.'/../resources/views', 'passport');

        if ($this->app->runningInConsole()) {
            //$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'laravel-system-migrations');

        }
    }

    public function register()
    {

    }

}
