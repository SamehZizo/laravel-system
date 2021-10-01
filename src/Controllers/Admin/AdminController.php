<?php

namespace Sameh\LaravelSystem\Controllers\Admin;

use Illuminate\Support\Facades\Artisan;
use Sameh\LaravelSystem\Controllers\Controller;

class AdminController extends Controller
{
    public function artisan_run($command)
    {
        //$exitCode = Artisan::call("passport:install");
        $exitCode = Artisan::all();
        return $exitCode;
    }

}
