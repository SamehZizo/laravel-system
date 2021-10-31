<?php

namespace Sameh\LaravelSystem\Controllers\System\FormBuilder;

use Sameh\LaravelSystem\Controllers\System\SystemController;
use Illuminate\Http\Request;

class SystemFormController extends SystemController
{
    public function __construct()
    {
        parent::__construct();
        $this->setSingularName('System Form');
        $this->setPluralName('System Forms');
        $this->setRouteName("system_forms");
        $this->setModelLocation('Sameh\LaravelSystem\Models\System\FormBuilder\SystemForm');
    }

    public function columns(): array
    {
        return [
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
                'data' => 'code',
                'name' => 'code',
                'title' => 'Code',
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
    }

    protected $store_validation = [
        'code' => 'unique:system_forms'
    ];

    public function create()
    {
        return view('laravel-system::form_builder.static.system_form')->with('singular_name', $this->getSingularName());
    }

    public function edit(Request $request, $id)
    {
        $row = $this->getModel()::find($id);
        return view('laravel-system::form_builder.static.system_form')->with('singular_name', $this->getSingularName())->with('row', $row);
    }

    protected function get_view_button($row, $child): string
    {
        $view_route = route('system_form_fields.index', ['id' => $row->id]);
        return '<li class="list-inline-item"><a href="' . $view_route . '" class="text-success"><i class="fa fa-eye"></i></a></li>';
    }

}
