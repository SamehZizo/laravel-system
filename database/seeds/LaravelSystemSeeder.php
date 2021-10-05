<?php

use Illuminate\Database\Seeder;

class LaravelSystemSeeder extends Seeder
{

    public function run()
    {
        $this->call(SystemFieldsTypesSeeder::class);
    }

}
