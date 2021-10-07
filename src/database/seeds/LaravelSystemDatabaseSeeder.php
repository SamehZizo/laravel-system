<?php

namespace Sameh\LaravelSystem\database\seeds;

use Illuminate\Database\Seeder;

class LaravelSystemDatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(SystemFieldsTypesSeeder::class);
    }

}
