<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    
    function dashboard(){
        $this->page_loader("dashboard",["title"=>"Dashboard"]);
    }

}
