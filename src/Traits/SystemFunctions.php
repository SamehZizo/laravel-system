<?php

namespace Sameh\LaravelSystem\Traits;

use Carbon\Carbon;
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
        foreach ($request->allFiles() as $key => $file) {
            $name = Carbon::now()->getPreciseTimestamp(3) . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads/models/' . $model->getRouteName() . '/' . $model->id;
            $file->move($destinationPath, $name);
            $system_file = new SystemFile();
            $system_file->name = $key;
            $system_file->location = $destinationPath . '/' . $name;
            $system_file->model = get_class($model);
            $system_file->model_id = $model->id;
            $system_file->save();
        }
    }

    public function getFile($model, $name)
    {
        $file = SystemFile::where('model', get_class($model))->where('model_id', $model->id)->where('name', $name)
            ->latest('created_at')->first();
        return $file ? url($file->location) : null;
    }
}
