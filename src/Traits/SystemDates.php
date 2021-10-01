<?php


namespace Sameh\LaravelSystem\Traits;

use Carbon\Carbon;

trait SystemDates
{

    public function getDateUserFormat($value)
    {
        return $value ? Carbon::parse($value)->format("Y-m-d") : '';
    }

}
