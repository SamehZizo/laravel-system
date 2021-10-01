<?php

namespace Sameh\LaravelSystem\Models\System;

use Sameh\LaravelSystem\Traits\SystemAttributes;
use Sameh\LaravelSystem\Traits\SystemDates;
use Sameh\LaravelSystem\Traits\SystemFunctions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class SystemModel extends SystemBasicModel
{
    use SoftDeletes, SystemDates, SystemAttributes, SystemFunctions;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public $appends = ['title'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = $this->getTableColumns();
    }

    private function getTableColumns(): array
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function set_admin_data($is_create = false)
    {
        if ($is_create) $this->created_by = Auth::id();
        $this->updated_by = Auth::id();
        $this->save();
    }

    public function delete()
    {
        $this->deleted_by = Auth::id();
        $this->save();
        return parent::delete();
    }

}
