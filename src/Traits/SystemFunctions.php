<?php

namespace Sameh\LaravelSystem\Traits;

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
}
