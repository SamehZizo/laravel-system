<?php


namespace Sameh\LaravelSystem\Models\System\FormBuilder;

class SystemForm extends SystemFormBuilder
{
    public function fields()
    {
        return $this->belongsToMany(SystemField::class, 'system_form_fields', 'form_id', 'field_id')
            ->join('system_fields_types', 'system_fields_types.id', '=', 'system_form_fields.field_type_id')
            ->whereNull('system_form_fields.deleted_at')
            ->select([
                'system_form_fields.id as id',
                'system_fields.title as title',
                'system_fields.name as name',
                'system_fields_types.slug as field_type_slug',
                'system_form_fields.col as col',
                'system_form_fields.is_hidden as is_hidden',
                'system_form_fields.is_disable as is_disable',
                'system_form_fields.is_required as is_required',
                'system_form_fields.system_model_id as system_model_id',
            ]);
    }
}
