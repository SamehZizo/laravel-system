<?php

namespace Sameh\LaravelSystem;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
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
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
            //$this->registerSeedsFrom(__DIR__ . '/../database/seeds');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ]);

            /*$this->publishes([
                __DIR__ . '/../database/seeds/SystemFieldsTypesSeeder.php' => database_path('seeds/SystemFieldsTypesSeeder.php'),
            ]);*/

        }
    }

    public function register()
    {
        $this->app->make('Sameh\LaravelSystem\Database\Seeders\LaravelSystemSeeder');
    }

    protected function registerSeedsFrom($path)
    {
        foreach (glob("$path/*.php") as $filename)
        {
            include $filename;
            $classes = get_declared_classes();
            $class = end($classes);

            $command = Request::server('argv', null);
            if (is_array($command)) {
                $command = implode(' ', $command);
                if ($command == "artisan db:seed") {
                    Artisan::call('db:seed', ['--class' => $class]);
                }
            }

        }
    }

}
