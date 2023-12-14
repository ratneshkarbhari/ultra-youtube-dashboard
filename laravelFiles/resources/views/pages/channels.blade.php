<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <h2>Channels</h2>
    <a href="{{url('import-data')}}" class="btn btn-success">Import Data</a>
    <br><br>
    <div class="table-responsive">
        <table id="example" class="display DataTable table table-bordered">
            <thead>
                <tr>
                    <th>YouTube Id</th>					
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($channels as $channel)
                <tr>
                    <td>{{$channel->yt_id}}</td>					
                    <td>{{$channel->name}}</td>
                    <td><a href="{{url('channel-videos/'.$channel['yt_id'])}}">See Videos</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>