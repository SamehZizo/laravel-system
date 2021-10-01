<?php

namespace Sameh\LaravelSystem;

use Illuminate\Support\ServiceProvider;

class LaravelSystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        dd('It works! 44');
    }

    public function register()
    {

    }

}
