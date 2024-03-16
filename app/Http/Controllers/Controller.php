<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getFirstDayOfTheMonth()
    {
        return date('Y-m-01');
    }

    public function getLastDayOfTheMonth()
    {
        return date('Y-m-t');
    }
}
