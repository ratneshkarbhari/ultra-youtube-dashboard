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

    function list_videos()
    {

        $this->page_loader("list_videos", [
            "title" => "Video Data",
            "videos" => VideoModel::all()
        ]);
    }


    function video_data($id)
    {

        $dataModel = new DataModel();

        $videoData = $dataModel->where("video_yt_id", $id)->get();

        $this->page_loader("video_data", [
            "title" => "Video data",
            "video_stats" => $videoData
        ]);
    }

    function video_data_edit()
    {

        $this->page_loader("video_data_edit", [
            "title" => "Video Data Edit",
        ]);
    }


    function import_data($success = "", $error = "")
    {

        $this->page_loader("import_data", [
            "title" => "Import Video Data",
            "success" => $success,
            "error" => $error,
        ]);
    }


    function channel_videos(
        Request $request
    ) {

        $ytId = $request->id;

        $channelVideos = VideoModel::where("channel_yt_id", $ytId)->orderBy("id", "desc")->get();

        $this->page_loader("channel_videos", [
            "title" => "Channel Videos",
            "videos" => $channelVideos
        ]);
    }




    function import_data_exe(Request $request)
    {

        /* 
            1. get path of uploaded file 
            * fetch current channel ids and video ids in db and video ids for which current month data exists            
            2. load data from uploaded file
            3. Create chunks from large data
            4. Create multiple empty arrays to hold chunk data for channels, videos and data
            5. Create multiple empty arrays to hold just ids of inserted data so we can verify right here instead of querying from db
            6. Iterate over chunks to access single data line.
            7. Save single line data to descriptive variable names
            8. Create single channel item check if id in temporary just inserted ids array and also check in the channel ids fetched before insert
            if doesnt exists in either add it to chunkchannels array and its id to inserted channels array
            8. Create single video item check if id in temporary just inserted ids array and also check in the video ids fetched before insert
            if doesnt exists in either add it to chunkvideos array and its id to inserted videos array
            8. Create single videoData item check if id in temporary just inserted ids array and also check in the videoData ids fetched before insert
            if doesnt exists in either add it to chunkvideoDatas array and its id to inserted videoDatas array
            9. if videodata exists in either fetch it from db and update
            Insert all chunk data after chunk iteration
        */

        $month = $request->monthSelect;
        $year = $request->yearSelect;

        $path = $request->file('videoData')->move('./assets/uploaded_data_files', date("d-m-y") . "-" . $request->monthSelect . "-" . $request->yearSelect . "." . $request->file("videoData")->extension());

        $queryToFetchCurrentChannelsInDb = 'SELECT yt_id FROM channels';
        $queryToFetchCurrentVideosInDb = 'SELECT yt_id FROM videos';
        $queryToFetchCurrentVideoDataInDb = 'SELECT video_yt_id FROM data WHERE month = "' . $month . '" AND year = ' . $year;



        $channelIdsResult = DB::select($queryToFetchCurrentChannelsInDb);
        $videoIdsResult = DB::select($queryToFetchCurrentVideosInDb);




        $videoDataResult = DB::select($queryToFetchCurrentVideoDataInDb);


        $channelIdsIndb = $videoIdsIndb = $videoDataIdsIndb = [];

        foreach ($channelIdsResult as $channelIdData) {

            $channelIdsIndb[] = $channelIdData->yt_id;
        }


        foreach ($videoIdsResult as $videoIdData) {


            $videoIdsIndb[] = $videoIdData->yt_id;
        }



        foreach ($videoDataResult as $videoDataResultData) {

            $videoDataIdsIndb[] = $videoDataResultData->video_yt_id;
        }



        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);

        $allVideoData = $spreadsheet->getActiveSheet()->toArray();

        unset($allVideoData[0]);

        $chunks = array_chunk($allVideoData, 200);

        $insertedChannels = $insertedVideos = $insertedVideoData =   [];


        foreach ($chunks as $videoDataPoints) {

            $chunkChannels = $chunkVideos = $chunkVideoData = [];

            foreach ($videoDataPoints as $videoData) {

                $videoYtId = $videoData[0];
                $channelYtId = $videoData[3];
                $channelName = $videoData[2];
                $type = $videoData[6];
                $assetId = $videoData[4];
                $customId = $videoData[5];
                $lot = $videoData[7];
                $movieAlbum = $videoData[8];
                $views = $videoData[9];
                $revenue = $videoData[10];
                $rpm = $videoData[11];

                $singleChannel = [
                    "yt_id" => $channelYtId,
                    "name" => $channelName
                ];

                $existsInTempChannelInsertArray = in_array($channelYtId, $insertedChannels);
                $existsInChannelTable = in_array($channelYtId, $channelIdsIndb);

                if (!$existsInTempChannelInsertArray && !$existsInChannelTable) {

                    $chunkChannels[] = $singleChannel;
                    $insertedChannels[] = $channelYtId;
                }

                $singleVideo = [
                    "yt_id" => $videoYtId,
                    "channel_yt_id" => $channelYtId,
                    "asset_id" => $assetId,
                    "type" => $type,
                    "lot" => $lot,
                    "movie_album"=> $movieAlbum,
                    "custom_id" => $customId
                ];

                $existsInTempVideoInsertArray = in_array($videoYtId, $insertedVideos);
                $existsInVideoTable = in_array($videoYtId, $videoIdsIndb);

                if(!$existsInTempVideoInsertArray&&!$existsInVideoTable){

                    $chunkVideos[] = $singleVideo;
                    $insertedVideos[] = $videoYtId;
                }
                
                
                $singleVideoData = [
                    "video_yt_id" => $videoYtId,
                    "month" => $month,
                    "year" => $year,
                    "views"=> $views,
                    "revenue" => $revenue,
                    "rpm" => $rpm
                ];

                $existsInTempVideoDataInsertArray = in_array($videoYtId, $insertedVideoData);
                $existsInVideoDataTable = in_array($videoYtId, $videoDataIdsIndb);

                if (!$existsInTempVideoDataInsertArray && !$existsInVideoDataTable) {

                    $chunkVideoData[] = $singleVideoData;
                    $insertedVideoData[] = $videoYtId;
                }
            }



            ChannelModel::insert($chunkChannels);
            VideoModel::insert($chunkVideos);
            DataModel::insert($chunkVideoData);
        }



        $this->import_data("Data imported successfully");


    }
}
