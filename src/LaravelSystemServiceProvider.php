<?php

namespace Sameh\LaravelSystem;

use Illuminate\Support\ServiceProvider;
use Sameh\LaravelSystem\Routing\CustomRouting;

class LaravelSystemServiceProvider extends ServiceProvider
{

    private $loadMigration = true;

    public function boot()
    {
        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () {
            return new CustomRouting($this->app['router']);
        });

        if ($this->app->runningInConsole()) {
            if ($this->loadMigration) {
                $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
                $this->loadMigration = false;
            }

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'laravel-system-migrations');

        }
    }

    public function register()
    {

    }

}
