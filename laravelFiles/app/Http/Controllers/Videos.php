<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelModel;
use App\Models\DataModel;
use App\Models\Video;
use App\Models\VideoModel;
use Illuminate\Http\Request;

class Videos extends Controller
{
    
    function list_videos(){

        $this->page_loader("list_videos",[
            "title" => "Video Data",
            "videos" => VideoModel::all()
        ]);

    }


    function video_data($id){

        $dataModel = new DataModel();

        $videoData = $dataModel->where("video_id",$id)->get();

        $this->page_loader("video_data",[
            "title" => "Video data",
            "video_stats" => $videoData
        ]);

    }

    function import_data($success="",$error=""){

        $this->page_loader("import_data",[
            "title" => "Import Video Data",
            "success" => $success,
            "error" => $error,
        ]);

    }

    private function create_video($videoObj){

        $videoModel = new VideoModel();



        if($videoObj["yt_id"]!="vid"){


            // $videoObj["title"] = substr($videoObj["title"],0,100)."...";

            return $videoModel->insertGetId($videoObj);


        }


    }

    private function create_data($dataObj){

        $videoDataModel = new DataModel();


        if($dataObj["views"]!="views"){

            $videoData = $videoDataModel->where("month",$dataObj["month"])->where("year",$dataObj["year"])->where("video_id",$dataObj["video_id"])->first();

            if($videoData){
                $videoDataModel->where("month",$dataObj["month"])->where("year",$dataObj["year"])->update($dataObj);
                return $videoData["id"];
            }else {
                return $videoDataModel->insertGetId($dataObj);
            }
    
    
    

        }

    }

    private function create_channel($channelObj){

        $channelModel = new ChannelModel();

        if($channelObj["yt_id"]!="channel_id"){

            return $channelModel->insertGetId($channelObj);


        }



    }


    function import_data_exe(Request $request){


        $path = $request->file('videoData')->move('./assets/uploaded_data_files',date("d-m-y")."-".$request->monthSelect."-".$request->yearSelect.".".$request->file("videoData")->extension());
            
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);

        $allVideoData = $spreadsheet->getActiveSheet()->toArray();


        foreach($allVideoData as $videoData){



            if($videoData[0]!="Video ID"){

                $videoExists = VideoModel::where("yt_id",$videoData[0])->first();

                if ($videoExists) {

                    if($videoData[8]!="views"){

                        $dataAddedId = $this->create_data([

                            "video_id" => $videoExists["id"],
                            "month" => $request->monthSelect,
                            "year" => $request->yearSelect,
                            "views" => $videoData[8],
                            "revenue" => $videoData[9]
    
                        ]);
    

                    }
                    
                    
                } else {
                    
                    $channelData = ChannelModel::where("yt_id",$videoData[4])->first();
                    
                    if(!$channelData){

                        $channelId = $this->create_channel([

                            "yt_id" => $videoData[4],
                            "name" => $videoData[2]

                        ]);

                    }else{
                        $channelId = $channelData["id"];
                    }

                    $videoAddedId = $this->create_video([
                        "yt_id" => $videoData[0],
                        // "title" => $videoData[1],
                        "asset_id" => $videoData[3],
                        "channel_system_id" => $channelId,
                        "type" => $videoData[5],
                        "lot" => $videoData[6],
                        "movie_album" => $videoData[7]
                    ]);
                    
                    $dataAddedId = $this->create_data([

                        "video_id" => $videoAddedId,
                        "month" => $request->monthSelect,
                        "year" => $request->yearSelect,
                        "views" => $videoData[8],
                        "revenue" => $videoData[9]

                    ]);

                }

            }

        }

        $this->import_data("Video Data uploaded","");

        exit;

    }
    
}