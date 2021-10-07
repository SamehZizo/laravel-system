<?php

namespace Sameh\LaravelSystem;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Sameh\LaravelSystem\Database\Seeders\LaravelSystemSeeder;
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

        dd(get_class(new LaravelSystemSeeder()));
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
