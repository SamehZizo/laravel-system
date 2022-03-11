<?php

namespace Sameh\LaravelSystem\Controllers\System\FormBuilder;

use Sameh\LaravelSystem\Models\System\FormBuilder\SystemForm;
use Sameh\LaravelSystem\Models\System\FormBuilder\SystemModels;
use Sameh\LaravelSystem\Models\System\SystemFile;

class FormBuilderController
{
    public static function build(SystemForm $form, $extra_form_data, $record = null)
    {
        $html_form = '';
        foreach ($form->fields as $field) {
            switch ($field->field_type_slug) {
                case 'text-input':
                    $html_form .= self::get_text_input($field, $record);
                    break;
                case 'text-editor':
                    $html_form .= self::get_text_editor($field, $record);
                    break;
                case 'model-dropdown':
                    $html_form .= self::get_model_dropdown($field, $record);
                    break;
                case 'number-input':
                    $html_form .= self::get_number_input($field, $record);
                    break;
                case 'check-box':
                    $html_form .= self::get_check_box($field, $record);
                    break;
                /*case 'dropdown':
                    $html_form .= self::get_dropdown($field, $record);
                    break;*/
                case 'multi-model-dropdown':
                    $html_form .= self::get_multi_model_dropdown($field, $record);
                    break;
                case 'date-input':
                    $html_form .= self::get_date_input($field, $record);
                    break;
                case 'file-input':
                    $html_form .= self::get_file_input($field, $record);
                    break;
            }
        }

        return $html_form;
        //return view('form_builder.modals.create')->with(['form' => $html_form, 'extra_form_data' => $extra_form_data]);
    }

    private static function get_text_input($field, $record)
    {
        return view('laravel-system::form_builder.fields.text_input')->with(['field' => $field, 'record' => $record]);
    }

    private static function get_text_editor($field, $record)
    {
        return view('laravel-system::form_builder.fields.text_editor')->with(['field' => $field, 'record' => $record]);
    }

    private static function get_model_dropdown($field, $record)
    {
        if ($field->system_model_id) {
            $system_model = SystemModels::find($field->system_model_id);
            if ($system_model) {
                $model_items = app($system_model->location)::all();
                return view('laravel-system::form_builder.fields.model_dropdown')->with(['field' => $field, 'items' => $model_items, 'record' => $record]);
            }
        }

        return '';
    }

    private static function get_number_input($field, $record)
    {
        return view('laravel-system::form_builder.fields.number_input')->with(['field' => $field, 'record' => $record]);
    }

    private static function get_check_box($field, $record)
    {
        return view('laravel-system::form_builder.fields.check_box')->with(['field' => $field, 'record' => $record]);
    }

    private static function get_dropdown($field, $record)
    {
        return view('laravel-system::form_builder.fields.dropdown')->with(['field' => $field, 'record' => $record]);
    }

    private static function get_multi_model_dropdown($field, $record)
    {
        //dd($record[$field->name]);
        $relation = $field['title'];
        $selected = [];
        //dd($record);
        if (!empty($record)) {
            $selected = $record->$relation()->pluck($relation . '.id')->toArray();
        }
        //
        //dd(is_array($selected));
        //dd($field['title'], $record->$relation()->pluck($relation . '.id'));
        if ($field->model_loc) {
            $model_items = app($field->model_loc)::all();
            return view('laravel-system::form_builder.fields.multi_model_dropdown')->with(['field' => $field, 'items' => $model_items, 'record' => $record, 'selected' => $selected]);
        } else {
            return '';
        }
    }

    private static function get_date_input($field, $record)
    {
        return view('laravel-system::form_builder.fields.date_input')->with(['field' => $field, 'record' => $record]);
    }

    private static function get_file_input($field, $record)
    {
        return view('laravel-system::form_builder.fields.file_input')->with(['field' => $field, 'record' => $record]);
    }

}
