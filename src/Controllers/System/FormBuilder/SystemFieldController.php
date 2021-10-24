<?php

namespace Sameh\LaravelSystem\Controllers\System\FormBuilder;

use Sameh\LaravelSystem\Controllers\System\SystemController;
use Illuminate\Http\Request;

class SystemFieldController extends SystemController
{
    public function __construct()
    {
        parent::__construct();
        $this->setSingularName('System Field');
        $this->setPluralName('System Fields');
        $this->setRouteName("system_fields");
        $this->setModelLocation('Sameh\LaravelSystem\Models\System\FormBuilder\SystemField');
        $this->setShowViewButton(false);
    }

    protected $columns = [
        [
            'data' => 'id',
            'name' => 'id',
            'title' => 'Id',
            'width' => 50,
            'order' => 'asc',
            'orderable' => false,
        ],
        [
            'data' => 'title',
            'name' => 'title',
            'title' => 'Title',
            'searchable' => true,
            'orderable' => true,
        ],
        [
            'data' => 'name',
            'name' => 'name',
            'title' => 'Name',
            'searchable' => true,
            'orderable' => true,
        ],
        [
            'data' => 'action',
            'name' => 'Action',
            'orderable' => false,
            'searchable' => false,
            'width' => 80,
        ],
    ];

    protected $store_validation = [
        'name' => 'unique:system_fields'
    ];

    public function create()
    {
        return view('laravel-system::form_builder.static.system_field')->with('singular_name', $this->getSingularName());
    }

    public function edit(Request $request, $id)
    {
        $row = $this->getModel()::find($id);
        return view('laravel-system::form_builder.static.system_field')->with('singular_name', $this->getSingularName())->with('row', $row);
    }

}
