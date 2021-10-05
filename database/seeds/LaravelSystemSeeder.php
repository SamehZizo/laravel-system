<?php

namespace Sameh\LaravelSystem\Seeds;

use Illuminate\Database\Seeder;

class LaravelSystemSeeder extends Seeder
{

    public function run()
    {
        $this->call(SystemFieldsTypesSeeder::class);
    }

}
