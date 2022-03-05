<?php

namespace Sameh\LaravelSystem\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemFieldsTypesSeeder extends Seeder
{
    private $field_types = array(
        array('id' => 1, 'title' => 'Text Input', 'slug' => 'text-input'),
        array('id' => 2, 'title' => 'Text Editor', 'slug' => 'text-editor'),
        array('id' => 3, 'title' => 'Model Dropdown', 'slug' => 'model-dropdown'),
        array('id' => 4, 'title' => 'Number Input', 'slug' => 'number-input'),
        array('id' => 5, 'title' => 'Check Box', 'slug' => 'check-box'),
        array('id' => 6, 'title' => 'Dropdown', 'slug' => 'dropdown'),
        array('id' => 7, 'title' => 'Multi Model Dropdown', 'slug' => 'multi-model-dropdown'),
        array('id' => 8, 'title' => 'Date Input', 'slug' => 'date-input'),
        array('id' => 9, 'title' => 'File Input', 'slug' => 'file-input'),
    );

    public function run()
    {
        DB::table('system_fields_types')->truncate();
        DB::table('system_fields_types')->insert($this->field_types);
    }

}
