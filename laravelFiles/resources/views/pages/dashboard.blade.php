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
    <div class="row">
        <div class="col-md-12 mb-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="true" onclick="drawChart2()">View</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="revenue-tab" data-bs-toggle="tab" data-bs-target="#revenue" type="button" role="tab" aria-controls="revenue" aria-selected="false" onclick="drawChart()">Revenue</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#rpm" type="button" role="tab" aria-controls="rpm" aria-selected="false" onclick="drawChart3()">RPM</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active w-100" id="view" role="tabpanel" aria-labelledby="view-tab">
                    <div id="myChart2" class="view-chart chart-line w-100"></div>
                </div>
                <div class="tab-pane fade w-100" id="revenue" role="tabpanel" aria-labelledby="revenue-tab">
                    <div id="myChart" class="revenue-chart chart-line w-100" style="width: 100%"></div>
                </div>
                <div class="tab-pane fade w-100" id="rpm" role="tabpanel" aria-labelledby="rpm-tab">
                    <div id="myChart3" class="rpm-chart chart-line w-100" style="width: 100%"></div>
                </div>
              </div>            
        </div>

        
        
    </div>

    <script>
        google.charts.load('current',{packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);
        google.charts.setOnLoadCallback(drawChart3);
        
        function drawChart() {
        
        // Set Data
        const data = google.visualization.arrayToDataTable([
          ['Month - Year', 'Revenue'],
          ['Jan - 23',7],['Feb - 23',8],['March - 23',6] 
        ]);
        
        // Set Options
        const options = {
          title: 'Revenue Throughout The Year',
          hAxis: {title: 'Month - Year'},
          vAxis: {title: 'Revenue'},
          legend: 'none'
        };
        
        // Draw
        const chart = new google.visualization.LineChart(document.getElementById('myChart'));
        chart.draw(data, options);        
        }

        function drawChart2() {
        
        // Set Data
        const data = google.visualization.arrayToDataTable([
          ['Month - Year', 'View'],
          ['Jan - 23',164],['Feb - 23',128],['March - 23',236] 
        ]);
        
        // Set Options
        const options = {
          title: 'View Throughout The Year',
          hAxis: {title: 'Month - Year'},
          vAxis: {title: 'View'},
          legend: 'none'
        };
        
        // Draw
        const chart2 = new google.visualization.LineChart(document.getElementById('myChart2'));
        chart2.draw(data, options);
        
        }
        function drawChart3() {        
        // Set Data
        const data = google.visualization.arrayToDataTable([
          ['Month - Year', 'RPM'],
          ['Jan - 23',164],['Feb - 23',128],['March - 23',236] 
        ]);
        
        // Set Options
        const options = {
          title: 'RPM Throughout The Year',
          hAxis: {title: 'Month - Year'},
          vAxis: {title: 'RPM'},
          legend: 'none'
        };
        
        // Draw
        const chart3 = new google.visualization.LineChart(document.getElementById('myChart3'));
        chart3.draw(data, options);
        
        }
            </script>
</main>