<?php

namespace Sameh\LaravelSystem;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Sameh\LaravelSystem\Database\Seeders\LaravelSystemDatabaseSeeder;
use Sameh\LaravelSystem\Routing\CustomRouting;

class LaravelSystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () {
            return new CustomRouting($this->app['router']);
        });


        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ]);

        }
    }

    public function register()
    {
        $this->app->make('Sameh\LaravelSystem\Seeds\LaravelSystemDatabaseSeeder');
    }

}
