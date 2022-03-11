<?php

namespace Sameh\LaravelSystem\Traits;

use Illuminate\Http\Request;
use Sameh\LaravelSystem\Models\System\SystemFile;

trait SystemFunctions
{
    public function system_round($number)
    {
        return round($number, 2, PHP_ROUND_HALF_DOWN);
    }

    public function system_number_format($number)
    {
        return number_format($number, 2);
    }

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
