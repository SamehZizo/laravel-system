<?php

namespace Sameh\LaravelSystem\Seeds;

use Illuminate\Database\Seeder;

class LaravelSystemDatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(SystemFieldsTypesSeeder::class);
    }

}
