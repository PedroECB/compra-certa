<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function verifySession()
    {
        session_start();

        if(!isset($_SESSION["usuario"]))
        {
            return false;

        }else{
            return true;
        }
    }


    public function verifySessionGerente()
    {

    }
}
