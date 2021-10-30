<?php


namespace Sameh\LaravelSystem\Controllers\System;


use Illuminate\Http\Request;

class SystemChildController extends SystemGenericController
{
    private $parent_field;

    public function child_index(Request $request, $parent_id)
    {
        $singular_name = $this->getSingularName();
        $plural_name = $this->getPluralName();
        $route_name = $this->getRouteName();
        $columns = $this->columns();
        $run_server_side = $this->getRunServerSide();
        $show_add_button = $this->getShowAddButton();

        $create_route = route($this->getCreateRouteName($request));
        //$datatable_route = $this->getDatatableRoute($request);
        $datatable_route = route($this->getRouteName() . '.child_datatable', [$parent_id]);
        $store_route = route($this->getStoreRouteName(), [$parent_id]);

        return view('laravel-system::layouts.datatable_child')->with('singular_name', $singular_name)
            ->with('datatable_route', $datatable_route)
            ->with('create_route', $create_route)->with('store_route', $store_route)
            ->with('plural_name', $plural_name)->with('route_name', $route_name)->with('columns', $columns)
            ->with('run_server_side', $run_server_side)->with('show_add_button', $show_add_button);
    }

    public function getModelData(Request $request, $parent_id = null)
    {
        $query = $this->getModel()::where($this->getParentField(), $parent_id);
        $query = $this->updateModelData($request, $query, $parent_id);
        return $query->get();
    }

    public function child_datatable(Request $request, $parent_id)
    {
        $data = $this->getModelData($request, $parent_id);
        return $this->initDatatable($data, true);
    }

    public function setRouteName($route_name): void
    {
        parent::setRouteName($route_name);
        if (!empty($this->getRouteName())) {
            $this->setCreateRouteName($this->getRouteName() . '.create');
            $this->setStoreRouteName($this->getRouteName() . '.child_store');
            $this->setViewRouteName($this->getRouteName() . '.child_show');
        }
    }

    public function child_store(Request $request, $id)
    {
        $request[$this->getParentField()] = $id;
        return parent::store($request);
    }

    public function child_show($id)
    {
        return parent::show($id, true);
    }

    /**
     * @return mixed
     */
    public function getParentField()
    {
        return $this->parent_field;
    }

    /**
     * @param mixed $parent_field
     */
    public function setParentField($parent_field): void
    {
        $this->parent_field = $parent_field;
    }
}
