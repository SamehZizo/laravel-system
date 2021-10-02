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

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }
    }

    public function register()
    {

    }

    private function registerMigrations()
    {
        dd(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'laravel-system-migrations');
    }

}
