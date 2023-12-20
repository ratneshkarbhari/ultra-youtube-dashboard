<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <h2 class="mb-3 pb-2 border-bottom">Welcome User</h2>

    <h5 class="mb-3 d-block">Top 25 Videos</h5>
    <div class="table-responsive mb-5">
        <table id="example" class="display DataTable table table-bordered">
            <thead>
                <tr>
                    <th>YouTube Id</th>					
                    <th>Video Title</th>				
                    <th>Chanel Name</th>
                    <th>Movie / Album</th>
                    <th>Views</th>
                    <th>Revenue</th>
                    <th>RPM</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
               
                <tr>
                    <td><a href="{{url('video-data/')}}">1234567</a></td>					
                    <td>Sayaji Shinde, Natle Mi Tumchyasathi - Scene 2/7</td>
                    <td>Ultra Marathi</td>                     
                    <td>Raudra</td>
                    <td>164</td>
                    <td>0.1768</td>
                    <td>123</td>
                    <td><a href="{{url('video-data/')}}" class="btn btn-sm btn-info" title="View Video Detail"><i class="fa-solid fa-eye"></i></a> </td>
                </tr> 
            </tbody>
        </table>
    </div>

    <h5 class="mb-3 d-block">Top 25 Chanel</h5>
    <div class="table-responsive mb-5">
        <table id="example" class="display DataTable table table-bordered">
            <thead>
                <tr>
                    <th>Chanel Id</th>		 			
                    <th>Chanel Name</th> 
                    <th>Views</th>
                    <th>Revenue</th> 
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
               
                <tr>
                    <td><a href="#">1234567</a></td>					 
                    <td>Ultra Marathi</td>     
                    <td>164</td>
                    <td>0.1768</td> 
                    <td><a href="{{url('video-data/')}}" class="btn btn-sm btn-info" title="View Video Detail"><i class="fa-solid fa-eye"></i></a>  </td>
                </tr> 
            </tbody>
        </table>
    </div>

</main>