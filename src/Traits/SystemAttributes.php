<?php


namespace Sameh\LaravelSystem\Traits;

use App\Models\User;
use Illuminate\Support\Facades\App;

trait SystemAttributes
{
    public function getTitleAttribute($value)
    {
        if (App::getLocale() == 'ar' && isset($this->title_ar)) {
            return $this->title_ar;
        } elseif (isset($this->title_en)) {
            return $this->title_en;
        } elseif (!empty($value)) {
            return $value;
        } else {
            return '';
        }
    }

    public function getCreatedByAttribute($value)
    {
        return empty($value) ? '' : User::find($value)->name;
    }

    public function getUpdatedByAttribute($value)
    {
        return empty($value) ? '' : User::find($value)->name;
    }

    public function getDeletedByAttribute($value)
    {
        return empty($value) ? '' : User::find($value)->name;
    }
}
