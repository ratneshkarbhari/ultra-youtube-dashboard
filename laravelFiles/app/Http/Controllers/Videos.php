<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelModel;
use App\Models\DataModel;
use App\Models\Video;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $month = $request->monthSelect;
        $year = $request->yearSelect;


        $path = $request->file('videoData')->move('./assets/uploaded_data_files',date("d-m-y")."-".$request->monthSelect."-".$request->yearSelect.".".$request->file("videoData")->extension());
            
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);

        $allVideoData = $spreadsheet->getActiveSheet()->toArray();

        $channelSystemIdsInDb = DB::select("select system_id from channels");

        $videoSystemIdsInDb = DB::select("select system_id from videos");


        $dataChunks = array_chunk($allVideoData,250);

        foreach($dataChunks as $chunk){

            $chunkChannels = $chunkVideos = $chunkData = $channelSystemIdsInserted = $videoSystemIdsInserted = [] ;

            foreach($chunk as $row){

                $videoYtId = $row[0];
                $channelYtId = $row[4];
                $assetId = $row[3];
                $channelName = $row[2];
                $type = $row[5];
                $lot = $row[6];
                $movieAlbum = $row[7];
                $views = $row[8];
                $revenue = $row[9];

                $channelSystemId = uniqid();
                $videoSystemId = uniqid();

                $singleChannel = [

                    "yt_id" => $channelYtId,
                    "system_id" => $channelSystemId,
                    "name" => $channelName

                ];


                if(!in_array($channelSystemId,$channelSystemIdsInserted)&&!in_array($channelSystemId,$channelSystemIdsInDb)){

                    $chunkChannels[] = $singleChannel;

                    $channelSystemIdsInserted[] = $channelSystemId;

                }

                $singleVideo = [

                    "yt_id" => $videoYtId,
                    "asset_id" => $assetId,
                    "channel_system_id" => $channelSystemId,
                    "system_id" => $videoSystemId,
                    "lot" => $lot,
                    "type" => $type,
                    "movie_album" => $movieAlbum

                ];

                if(!in_array($videoSystemId,$videoSystemIdsInserted)&&!in_array($videoSystemId,$videoSystemIdsInDb)){

                    $chunkVideos[] = $singleVideo;
                    $videoSystemIdsInserted[] = $videoSystemId;

                }


                $singleVideoData = [
                    "video_system_id" => $videoSystemId,
                    "month" => $month,
                    "year" => $year,
                    "views" => $views,
                    "revenue" => $revenue
                ];

                if(!$dataExists = DataModel::where("video_system_id",$videoSystemId)->where("month",$month)->where("year",$year)){

                    $chunkData[] = $singleVideoData;
                    
                }else{

                    DataModel::find($dataExists["id"])->update($singleVideoData);


                }


            }

            ChannelModel::insert($chunkChannels);
            VideoModel::insert($chunkVideos);


        }
        
    }
    
}