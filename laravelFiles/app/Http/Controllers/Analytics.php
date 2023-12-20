<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Analytics extends Controller
{
    function analytics_home()
    {

        $this->page_loader("analytics_home", [
            "title" => "Analytics Data",
        ]);
    }
}
