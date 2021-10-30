<?php


namespace Sameh\LaravelSystem\Traits;

use Yajra\DataTables\DataTables;

trait DatatableTrait
{

    public function initDatatable($data, $child = false)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) use ($child) {

                $btn = '<ul class="list-inline mb-0">';

                /*if ($child) {
                    $view_route = route($this->getRouteName() . '.child_show', ['id' => $row->id]);
                    $edit_route = route($this->getRouteName() . '.child_edit', ['id' => $row->id]);
                    $update_route = route($this->getRouteName() . '.child_update', ['id' => $row->id]);
                    $delete_route = route($this->getRouteName() . '.child_destroy', ['id' => $row->id]);

                    if ($this->getShowViewButton()) {
                        $btn .= $this->get_child_view_button($row);
                    }

                    if ($this->getShowEditButton()) {
                        $btn .= $this->get_child_edit_button($row);
                    }

                    if ($this->getShowDeleteButton()) {
                        $btn .= $this->get_child_delete_button($row);
                    }
                } else {*/

                    if ($this->getShowViewButton()) {
                        $btn .= $this->get_view_button($row, $child);
                    }

                    if ($this->getShowEditButton()) {
                        $btn .= $this->get_edit_button($row);
                    }

                    if ($this->getShowDeleteButton()) {
                        $btn .= $this->get_delete_button($row);
                    }
                //}

                $btn .= '</ul>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    protected function get_view_button($row, $child): string
    {
        //$view_route = route($this->getRouteName() . '.show', ['id' => $row->id]);
        $view_route = route($this->getViewRouteName(), ['id' => $row->id]);

        /*return '<li class="list-inline-item"><a href="#" class="form-builder-modal-button text-success" data-toggle="modal" data-target="#viewModal"
            data-id="' . $row->id . '" data-title="' . 'View ' . $this->getSingularName() . '" data-form-route="' . $view_route . '"
            data-backdrop="static" data-keyboard="false"><i class="fa fa-eye"></i></a></li>';*/
        if ($child) {
            return '<li class="list-inline-item"><a href="#" class="form-builder-modal-button text-success" data-toggle="modal" data-target="#formBuilderModal"
            data-id="' . $row->id . '" data-title="' . 'View ' . $this->getSingularName() . '" data-form-route="' . $view_route . '"><i class="fa fa-eye"></i></a></li>';
        } else {
            return '<li class="list-inline-item"><a href="' . $view_route . '" class="text-success" target="_blank"><i class="fa fa-eye"></i></a></li>';
        }
    }

    protected function get_edit_button($row): string
    {
        $edit_route = route($this->getRouteName() . '.edit', ['id' => $row->id]);
        $update_route = route($this->getRouteName() . '.update', ['id' => $row->id]);

        return '<li class="list-inline-item"><a href="#" class="form-builder-modal-button text-primary" data-toggle="modal" data-target="#formBuilderModal"
        data-id="' . $row->id . '" data-form-route="' . $edit_route . '" data-title="' . 'Edit ' . $this->getSingularName() . ' : ' . $row->title . '"
        data-action="' . $update_route . '" data-form-type="edit" data-backdrop="static" data-keyboard="false"><i class="fa fa-edit"></i></a></li>';
    }

    protected function get_delete_button($row)
    {
        $delete_route = route($this->getRouteName() . '.destroy', ['id' => $row->id]);
        return '<li class="list-inline-item"><a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal" data-id="' . $row->id . '"
        data-title="' . $row->title . '" data-action="' . $delete_route . '" data-model-title="' . $this->getSingularName() . '"
        data-backdrop="static" data-keyboard="false"><i class="fa fa-trash"></i></a></li>';
    }

    protected function get_child_view_button($row)
    {
        $view_route = route($this->getRouteName() . '.child_show', ['id' => $row->id]);

        return '<li class="list-inline-item"><a href="#" class="form-builder-modal-button text-success view-child-button"
            data-id="' . $row->id . '" data-title="' . 'View ' . $this->getSingularName() . '" data-form-route="' . $view_route . '"
            data-backdrop="static" data-keyboard="false"><i class="fa fa-eye"></i></a></li>';
    }

    protected function get_child_edit_button($row)
    {
        return '';
    }

    protected function get_child_delete_button($row)
    {
        return '';
    }

}
