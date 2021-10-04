<?php

use Illuminate\Database\Seeder;
use Sameh\LaravelSystem\Models\System\FormBuilder\SystemFieldsType;

class SystemFieldsTypesSeeder extends Seeder
{
    private $field_types = [
        'Text Input' => 'text-input',
        'Text Editor' => 'text-editor',
        'Model Dropdown' => 'model-dropdown',
        'Number Input' => 'number-input',
        'Check Box' => 'check-box',
        'Dropdown' => 'dropdown',
        'Multi Model Dropdown' => 'multi-model-dropdown',
        'Date Input' => 'date-input',
    ];

    public function run()
    {
        foreach ($this->field_types as $key => $value) {
            $field_type = new SystemFieldsType();
            $field_type->title = $key;
            $field_type->slug = $value;
            $field_type->save();
        }
    }

}
