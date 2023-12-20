<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <h2>Video data</h2>
    <a href="{{url('import-data')}}" class="btn btn-success">Import Data</a>
    <br><br>
    <div class="table-responsive">
        <table id="example" class="display DataTable table table-bordered">
            <thead>
                <tr>
                    <th>Month</th>					
                    <th>Year</th>
                    <th>Views</th>
                    <th>Revenue</th>
                    <th>RPM</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($video_stats as $video_stat)
                <tr>
                    		
                    <td>{{$video_stat->month}}</td>					
                    <td>{{$video_stat->year}}</td>					
                    <td>{{$video_stat->views}}</td>					
                    <td>{{$video_stat->revenue}}</td>				
                    <td>{{$video_stat->rpm}}</td>						
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>