<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="heading-1">Channels</h2>        
        <a href="{{url('import-data')}}" class="btn btn-success btn-sm">Import Data</a>
     </div> 
    <div class="table-responsive mb-5">
        <table id="example" class="display DataTable table table-bordered">
            <thead>
                <tr>
                    <th>YouTube Id</th>					
                    <th>Name</th>
                    <th>Views</th>
                    <th>Revenue</th> 
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($channels as $channel)
                <tr>
                    <td>{{$channel->yt_id}}</td>                    				
                    <td>{{$channel->name}}</td>
                    <td>{{$channel->view}}</td>
                    <td>{{$channel->revenue}}</td> 
                    <td><a href="{{url('channel-videos/'.$channel['yt_id'])}}" class="btn btn-sm btn-info" title="See Videos List"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>