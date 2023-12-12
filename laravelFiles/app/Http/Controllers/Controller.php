<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function page_loader($pageName,$data){
        echo view("templates/header",$data);
        echo view("pages/".$pageName,$data);
        echo view("templates/footer",$data);
    }

}
