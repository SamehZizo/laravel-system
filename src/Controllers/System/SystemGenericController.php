<?php


namespace Sameh\LaravelSystem\Controllers\System;

use Sameh\LaravelSystem\Controllers\System\FormBuilder\FormBuilderController;
use Sameh\LaravelSystem\Models\System\FormBuilder\SystemForm;
use Sameh\LaravelSystem\Traits\DatatableTrait;
use Sameh\LaravelSystem\Traits\SystemFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemGenericController extends SystemBasicController
{

    use DatatableTrait, SystemFunctions;

    public function index(Request $request)
    {
        $singular_name = $this->getSingularName();
        $plural_name = $this->getPluralName();
        $route_name = $this->getRouteName();
        $columns = $this->columns;
        $run_server_side = $this->getRunServerSide();
        $show_add_button = $this->getShowAddButton();

        //$create_route = route($this->getCreateRouteName($request));
        $create_route = $this->getCreateRoute($request);
        $datatable_route = $this->getDatatableRoute($request);
        $store_route = route($this->getStoreRouteName());

        return view('layouts.datatable_layout')->with('singular_name', $singular_name)
            ->with('datatable_route', $datatable_route)
            ->with('create_route', $create_route)->with('store_route', $store_route)
            ->with('plural_name', $plural_name)->with('route_name', $route_name)->with('columns', $columns)
            ->with('run_server_side', $run_server_side)->with('show_add_button', $show_add_button);
    }

    public function getModelData(Request $request, $parent_id = null)
    {
        $query = $this->getModel();
        $query = $this->updateModelData($request, $query, $parent_id);
        return $query->get();
    }

    public function updateModelData($request, $query, $parent_id)
    {
        return $query;
    }

    public function datatable(Request $request)
    {
        $data = $this->getModelData($request);
        return $this->initDatatable($data);
    }

    public function show($id, $child = false)
    {
        $record = $this->getModel()::find($id);

        if (view()->exists('modules.' . $this->getRouteName() . '.view')) $view = 'modules.' . $this->getRouteName() . '.view';
        else {
            if ($child) $view = 'layouts.modules.view_child'; else $view = 'layouts.modules.view';
        }

        return view($view)->with('record', $record);
    }

    public function create()
    {
        /*$extra_form_data = \request()->all();
        dd($extra_form_data);*/
        $form = SystemForm::where('code', $this->getFormCode())->first();
        if (!$form) {
            return '<div class="text-danger">No form added yet !</div>';
        } elseif (count($form->fields) == 0) {
            return '<div class="text-danger">No fields added yet !</div>';
        } else {
            return FormBuilderController::build($form, /*$this->extra_form_data*/ null);
        }
    }

    public function store(Request $request)
    {
        $validation = validator($request->all(), $this->store_validation);
        if ($validation->fails()) {
            return response()->json($validation->errors()->all(), 422);
        }
        $new_model = $this->getModel();
        $new_model->fill($request->all());
        $new_model->save();
        $new_model->set_admin_data(true);
        $this->before_store($request, $new_model);
        return response()->json($this->getSingularName() . ' created successfully');
    }

    public function edit(Request $request, $id)
    {
        $record = $this->getModel()::find($id);
        $form = SystemForm::where('code', $this->getFormCode())->first();
        if (!$form) {
            return '<div class="text-danger">No form added yet !</div>';
        } elseif (count($form->fields) == 0) {
            return '<div class="text-danger">No fields added yet !</div>';
        } else {
            return FormBuilderController::build($form, /*$this->extra_form_data*/ null, $record);
        }
    }

    public function update(Request $request)
    {
        $validation = validator($request->all(), $this->store_validation);
        if ($validation->fails()) {
            return response()->json($validation->errors()->all(), 422);
        }

        $model = $this->getModel()::find($request['id']);
        $model->fill($request->all());
        $model->save();
        $model->set_admin_data();
        return response()->json($this->getSingularName() . ' updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $this->getModel()::find($id)->delete();
        return response()->json($this->getSingularName() . ' deleted successfully');
    }

    protected function children_index(Request $request, $id, $child_name)
    {
        $request['child'] = true;
        $children = [];
        $children = $this->get_children($request, $id, $children);
        return $children[$child_name] ?? '';
    }

    protected function get_children(Request $request, $id, $children)
    {
        return $children;
    }

}
