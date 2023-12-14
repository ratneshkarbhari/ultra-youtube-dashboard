<?php

namespace App\Http\Controllers;

use App\Models\ChannelModel;
use Illuminate\Http\Request;

class Channels extends Controller
{
    function list_channels (){
        
        $allChannels = ChannelModel::all();

        $this->page_loader("channels",[
            "title" => "Channels",
            "channels" => $allChannels
        ]);


    }
}
