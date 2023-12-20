<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="heading-1">Hollywood Clips</h2>        
        <a href="{{url('import-data')}}" class="btn btn-success">Import Data</a>
     </div>  
    <div class="table-responsive">
        <table id="example" class="display DataTable table table-bordered">
            <thead>
                <tr>
                    <th>YouTube Id</th>					
                    <th>Video Title</th>					
                    <th>Asset Id</th>
                    <th>Custom ID</th>
                    <th>Type</th>
                    <th>Lot</th>
                    <th>Movie / Album</th>
                    <th>Views</th>
                    <th>Revenue</th>
                    <th>RPM</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($videos as $video)
                <tr>
                    <td><a href="{{url('video-data/'.$video->yt_id)}}">{{$video->yt_id}}</a></td>					
                    <td>{{$video->title}}</td>
                    <td>{{$video->asset_id}}</td>
                    <td>{{$video->custom_id}}</td>
                    <td>{{$video->type}}</td>
                    <td>{{$video->lot}}</td>
                    <td>{{$video->movie_album}}</td>
                    <td>{{$video->views}}</td>
                    <td>{{$video->revenue}}</td>
                    <td>{{$video->rpm}}</td>
                    <td><a href="{{url('video-data/'.$video->yt_id)}}" class="btn btn-sm btn-info" title="View Video Detail"><i class="fa-solid fa-eye"></i></a> 
                        <button class="btn-sm btn btn-primary" title="Edit Video Detail"><i class="fa-solid fa-pen-to-square"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>