<?php

namespace Sameh\LaravelSystem\Controllers\System\FormBuilder;

use Sameh\LaravelSystem\Controllers\System\SystemController;
use Sameh\LaravelSystem\Models\System\FormBuilder\SystemField;
use Sameh\LaravelSystem\Models\System\FormBuilder\SystemFieldsType;
use Sameh\LaravelSystem\Models\System\FormBuilder\SystemModels;
use Illuminate\Http\Request;

class SystemFormFieldsController extends SystemController
{
    public function __construct()
    {
        parent::__construct();
        $this->setSingularName('System Form Field');
        $this->setPluralName('System Form Fields');
        $this->setRouteName("system_form_fields");
        $this->setModelLocation('App\Models\System\FormBuilder\SystemFormField');
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
            'data' => 'field.title',
            'name' => 'field.title',
            'title' => 'Title',
        ],
        [
            'data' => 'col',
            'name' => 'col',
            'title' => 'Columns',
        ],
        [
            'data' => 'is_required',
            'name' => 'is_required',
            'title' => 'Required',
        ],
        [
            'data' => 'is_hidden',
            'name' => 'is_hidden',
            'title' => 'Hidden',
        ],
        [
            'data' => 'is_disable',
            'name' => 'is_disable',
            'title' => 'Disable',
        ],
        [
            'data' => 'action',
            'name' => 'Action',
            'orderable' => false,
            'searchable' => false,
            'width' => 80,
        ],
    ];

    public function getModelData(Request $request, $parent_id = null)
    {
        return $this->getModel()::where('form_id', $request['id'])->with('field')->get();
    }

    public function getDatatableRoute(Request $request)
    {
        return route($this->getRouteName() . '.datatable', ['id' => $request['id']]);
    }

    public function getCreateRoute(Request $request)
    {
        return route($this->getRouteName() . '.create', ['form_id' => $request['id']]);
    }

    public function create()
    {
        $extra_form_data = \request()->all();
        $system_fields = SystemField::orderBy('name')->get();
        $system_fields_types = SystemFieldsType::orderBy('title')->get();

        return view('laravel-system::form_builder.static.system_form_field')
            ->with('system_fields', $system_fields)
            ->with('system_fields_types', $system_fields_types)
            ->with('extra_form_data', $extra_form_data);
    }

    public function edit(Request $request, $id)
    {
        $row = $this->getModel()::find($id);
        $system_fields = SystemField::orderBy('name')->get();
        $system_fields_types = SystemFieldsType::orderBy('title')->get();

        return view('laravel-system::form_builder.static.system_form_field')->with('row', $row)
            ->with('system_fields', $system_fields)
            ->with('system_fields_types', $system_fields_types);
    }

    public function get_system_models()
    {
        return SystemModels::all();
    }
}
