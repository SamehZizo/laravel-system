<?php


namespace Sameh\LaravelSystem\Controllers\System;


use Sameh\LaravelSystem\Controllers\Controller;
use Illuminate\Http\Request;

class SystemBasicController extends Controller
{
    private $singular_name, $plural_name, $title_name;
    private $model_location;
    private $run_server_side;
    private $route_name, $datatable_route, $create_route_name, $store_route_name, $view_route_name;
    private $create_route;
    private $model;
    private $show_view_button, $show_add_button, $show_edit_button, $show_delete_button;
    private $form_code;
    private $title_column;

    public function columns(): array
    {
        $title = $this->getTitleColumn();
        return [
            [
                'data' => 'id',
                'name' => 'id',
                'title' => 'Id',
                'width' => 50,
                'order' => 'asc',
                'orderable' => true,
            ],
            [
                'data' => $title,
                'name' => $title,
                'title' => 'Title',
                'searchable' => true,
                'orderable' => true,
            ],
            /*[
                'data' => 'title_en',
                'name' => 'English Title',
            ],
            [
                'data' => 'title_ar',
                'name' => 'Arabic Title',
            ],*/
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
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->setSingularName('');
        $this->setPluralName('');
        $this->setRouteName('');
        $this->setModelLocation('');
        // title column
        $this->setTitleColumn('');
        // server side
        $this->setRunServerSide(true);
        // buttons
        $this->setShowViewButton(true);
        $this->setShowAddButton(true);
        $this->setShowEditButton(true);
        $this->setShowDeleteButton(true);
    }

    /**
     * @return mixed
     */
    public function getSingularName()
    {
        return $this->singular_name;
    }

    /**
     * @param mixed $singular_name
     */
    public function setSingularName($singular_name): void
    {
        $this->singular_name = $singular_name;
    }

    /**
     * @return mixed
     */
    public function getPluralName()
    {
        return $this->plural_name;
    }

    /**
     * @param mixed $plural_name
     */
    public function setPluralName($plural_name): void
    {
        $this->plural_name = $plural_name;
    }

    /**
     * @return mixed
     */
    public function getModelLocation()
    {
        return $this->model_location;
    }

    /**
     * @param mixed $model_location
     */
    public function setModelLocation($model_location): void
    {
        $this->model_location = $model_location;
        if (!empty($this->model_location)) {
            $this->setModel(app($this->model_location));
        }
    }

    /**
     * @return mixed
     */
    public function getRunServerSide()
    {
        return $this->run_server_side;
    }

    /**
     * @param mixed $run_server_side
     */
    public function setRunServerSide($run_server_side): void
    {
        $this->run_server_side = $run_server_side;
    }

    /**
     * @return mixed
     */
    public function getRouteName()
    {
        return $this->route_name;
    }

    /**
     * @param mixed $route_name
     */
    public function setRouteName($route_name): void
    {
        $this->route_name = $route_name;
        if (!empty($this->route_name)) {
            $this->setFormCode($this->route_name . '_form');
            $this->setDatatableRoute(route($this->route_name . '.datatable'));
            $this->setCreateRouteName($this->route_name . '.create');
            $this->setStoreRouteName($this->route_name . '.store');
            $this->setViewRouteName($this->route_name . '.show');
        }
    }

    /**
     * @return mixed
     */
    public function getTitleName()
    {
        return $this->title_name;
    }

    /**
     * @param mixed $title_name
     */
    public function setTitleName($title_name): void
    {
        $this->title_name = $title_name;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getShowViewButton()
    {
        return $this->show_view_button;
    }

    /**
     * @param mixed $show_view_button
     */
    public function setShowViewButton($show_view_button): void
    {
        $this->show_view_button = $show_view_button;
    }

    /**
     * @return mixed
     */
    public function getShowAddButton()
    {
        return $this->show_add_button;
    }

    /**
     * @param mixed $show_add_button
     */
    public function setShowAddButton($show_add_button): void
    {
        $this->show_add_button = $show_add_button;
    }

    /**
     * @return mixed
     */
    public function getShowEditButton()
    {
        return $this->show_edit_button;
    }

    /**
     * @param mixed $show_edit_button
     */
    public function setShowEditButton($show_edit_button): void
    {
        $this->show_edit_button = $show_edit_button;
    }

    /**
     * @return mixed
     */
    public function getShowDeleteButton()
    {
        return $this->show_delete_button;
    }

    /**
     * @param mixed $show_delete_button
     */
    public function setShowDeleteButton($show_delete_button): void
    {
        $this->show_delete_button = $show_delete_button;
    }

    /**
     * @return mixed
     */
    public function getFormCode()
    {
        return $this->form_code;
    }

    /**
     * @param mixed $form_code
     */
    public function setFormCode($form_code): void
    {
        $this->form_code = $form_code;
    }

    /**
     * @return mixed
     */
    public function getDatatableRoute(Request $request)
    {
        return $this->datatable_route;
    }

    /**
     * @param mixed $datatable_route
     */
    public function setDatatableRoute($datatable_route): void
    {
        $this->datatable_route = $datatable_route;
    }

    /**
     * @return mixed
     */
    public function getCreateRouteName(Request $request)
    {
        return $this->create_route_name;
    }

    /**
     * @param mixed $create_route
     */
    public function setCreateRouteName($create_route_name): void
    {
        $this->create_route_name = $create_route_name;
        if (!empty($create_route_name)) $this->setCreateRoute(route($create_route_name));
    }

    /**
     * @return mixed
     */
    public function getStoreRouteName()
    {
        return $this->store_route_name;
    }

    /**
     * @param mixed $store_route
     */
    public function setStoreRouteName($store_route_name): void
    {
        $this->store_route_name = $store_route_name;
    }

    /**
     * @return mixed
     */
    public function getViewRouteName()
    {
        return $this->view_route_name;
    }

    /**
     * @param mixed $view_route
     */
    public function setViewRouteName($view_route_name): void
    {
        $this->view_route_name = $view_route_name;
    }

    /**
     * @return mixed
     */
    public function getCreateRoute(Request $request)
    {
        return $this->create_route;
    }

    /**
     * @param mixed $create_route
     */
    public function setCreateRoute($create_route): void
    {
        $this->create_route = $create_route;
    }

    /**
     * @return mixed
     */
    public function getTitleColumn()
    {
        return $this->title_column;
    }

    /**
     * @param mixed $title_column
     */
    public function setTitleColumn($title_column): void
    {
        !empty($title_column) ? $this->title_column = $title_column : $this->title_column = 'title';
    }

    /**
     * @param mixed $model
     */
    private function setModel($model): void
    {
        $this->model = $model;
    }

    protected function before_store(Request $request, $model)
    {
    }

    protected function before_update(Request $request, $model)
    {
    }

    protected function update_relations(Request $request, $model)
    {
    }
}
