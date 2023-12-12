<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <h2>Videos</h2>
    <a href="{{url('import-data')}}" class="btn btn-success">Import Data</a>
    <br><br>
    <div class="table-responsive">
        <table id="example" class="display DataTable table table-bordered">
            <thead>
                <tr>
                    <th>YouTube Id</th>					
                    <th>Asset Id</th>
                    <th>Channel</th>
                    <th>Type</th>
                    <th>Lot</th>
                    <th>Movie / Album</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($videos as $video)
                <tr>
                    <td><a href="{{url('video-data/'.$video->id)}}">{{$video->yt_id}}</a></td>					
                    <td>{{$video->asset_id}}</td>
                    <td>{{$video->channel_system_id}}</td>
                    <td>{{$video->type}}</td>
                    <td>{{$video->lo}}t</td>
                    <td>{{$video->movie_album}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>