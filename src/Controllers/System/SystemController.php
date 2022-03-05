<?php


namespace Sameh\LaravelSystem\Controllers\System;


use Illuminate\Http\Request;
use Sameh\LaravelSystem\Models\System\SystemFile;

class SystemController extends SystemGenericController
{

    public function saveFiles(Request $request, $model)
    {
        foreach ($request->allFiles() as $file) {
            $name = $file->getClientOriginalName();
            $destinationPath = 'uploads/models/' . $model->getRouteName() . '/' . $model->id;
            $file->move($destinationPath, $file->getClientOriginalName());
            $system_file = new SystemFile();
            $system_file->name = $name;
            $system_file->location = $destinationPath;
            $system_file->model = get_class($model);
            $system_file->model_id = $model->id;
            $system_file->save();
        }
    }

}
