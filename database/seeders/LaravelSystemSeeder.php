<?php

namespace Sameh\LaravelSystem\Database\Seeders;

use Illuminate\Database\Seeder;

class LaravelSystemSeeder extends Seeder
{

    public function run()
    {
        $this->call(SystemFieldsTypesSeeder::class);
    }

}
