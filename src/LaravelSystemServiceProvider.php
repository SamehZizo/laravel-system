<?php

namespace Sameh\LaravelSystem;

use Illuminate\Support\ServiceProvider;

class LaravelSystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        dd('It works! 33');
    }

    public function register()
    {

    }

}
