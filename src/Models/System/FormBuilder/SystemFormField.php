<?php


namespace Sameh\LaravelSystem\Models\System\FormBuilder;


class SystemFormField extends SystemFormBuilder
{
    public function field()
    {
        return $this->belongsTo(SystemField::class);
    }
}
