<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="heading-1">Analytics</h2>        
        <a href="{{url('import-data')}}" class="btn btn-success">Import Data</a>
     </div>   

    <div class="row mb-3">
        <div class="col-md-3 mb-md-0 mb-3">
            <label for="" class="">Chanel Name</label>
            <select id="single" class="single js-states form-control">
                <option>Select Chanel</option>
                <option>Ultra Marathi</option>
                <option>Ultra Bollywood</option>
                <option>Ultra Marathi BUZZ</option>
                <option>Gaane Naye Purane</option>
                <option>Ultra Gujarati</option>
                <option>Bolly Shorts</option>
                <option>JokesJunction</option>
                <option>Shri Jai Hanuman</option>
                <option>Ultra Movie Parlour</option>
                <option>Hindi MoviePlex</option>
                <option>Krunal Music</option>
                <option>Filmy Duniya</option>
                <option>Ultra Movie Hub</option>
                <option>Ultra Bhakti</option>
                <option>Ultra TV Series</option>
                <option>Hollywood Clips</option>
                <option>Ultra Action Hits</option>
                <option>SuperHit Gaane</option>
                <option>Bollywood Clips</option>
                <option>Bollywood Premium</option>
                <option>Narayan Reiki Satsang Parivar</option>
                <option>Ultra Cinema</option>
                <option>Tamil Movieplex</option>
                <option>Ultra Kids Zone</option>
                <option>Bhojpuriya Jhakkas</option>
                <option>Hollywood Bangla</option>
                <option>People & History</option>
                <option>Ultra Cookery</option>
                <option>Khandeshi Videos</option>
                <option>Page3 Reporter</option>
                <option>Ultra Bengali</option>
                <option>Ultra Telugu</option>
                <option>Haste Raho</option>
                <option>Film City HD</option>
                <option>Ultra Devotional</option>
                <option>PlayMovies</option>
                <option>Hollywood Marathi</option>
                <option>Kids Tamil</option>
                <option>Zabardast Action</option>
                <option>Ultra Classic</option>
                <option>JaiBhimMajha</option>
                <option>Super Shaktimaan</option>
                <option>Romantic Gaane</option>
                <option>Bangla Kids</option>
                <option>Ultra Movie World</option>
                <option>Marathi MoviePlex</option>
                <option>Ladies Special</option>
                <option>MalgudiDays</option>
                <option>Bollywood Dil Se</option>
                <option>BanglaSongs</option>
                <option>Gaane Ke Jukebox</option>
                <option>Hollywood Hindi</option>
                <option>Superhit Gujarati Geet</option>
                <option>Telugu StoryTime</option>
                <option>Hansi Mazaak</option>
                <option>Bollywood Trailers</option>
                <option>Comedy Super Kings</option>
                <option>Bollywood 70s 80s</option>
                <option>UltraKids</option>
                <option>Hindi Dubbed Movies</option>
                <option>Bhajan Sangeet</option>
                <option>Ultra Filmy</option>
                <option>Filmy Deewane</option>
                <option>Dhamaal Marathi</option>
                <option>Ultra Music Marathi</option>
                <option>Satark Marathi</option>
                <option>Marathi Biography</option>
                <option>Shri Radhakrishnaji Maharaj</option>
                <option>Kids Movies</option>
                <option>2000s Ki Filmein</option>
                <option>Sai Baba Bhakti</option>
                <option>Dumdaar Villains</option>
                <option>Kids Gujarati</option>
                <option>Gaane 70s 80s</option>
                <option>Bhakti Katha</option>
                <option>Crime Stories</option>
                <option>MintageWorld</option>
                <option>Ultra Sports</option>
                <option>Kids Marathi</option>
                <option>Hollywood Tamil</option>
                <option>Mahaguru Mithun</option>
                <option>Ultra Web Series</option>
                <option>Maro Banjara</option>
                <option>Hollywood Telugu</option>
                <option>The Kapoors</option>
                <option>90s Filmy Gaane</option>
                <option>Dard Bhare Songs</option>
                <option>Dharam Paaji</option>
                <option>Hollywood Punjabi</option>
                <option>Indian TV Series</option>
                <option>Ajay Akshay Suniel</option>
                <option>Bhojpuri Kids</option>
                <option>90's Bollywood</option>
                <option>South Ke Khiladi</option>
                <option>Sanju Baba Ka Fan</option>
                <option>Alert India</option>
                <option>Parmarth SevaSamiti</option>
            </select>

        </div>
        <div class="col-md-3 mb-md-0 mb-3">
            <label for="">From Date</label>
            <input type="date" class="form-control">
        </div>
        <div class="col-md-3 mb-md-0 mb-3">
            <label for="">To Date</label>
            <input type="date" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="" class="d-md-block d-none">&nbsp;</label>
            <button class="btn-sm btn btn-primary">Submit</button>
        </div>
    </div>
    <div class="table-responsive mb-5">
        <table id="example" class="display DataTable table table-bordered">
            <thead>
                <tr>
                    <th>YouTube Id</th>					
                    <th>Video Title</th>					
                    <th>Asset Id</th>
                    <th>Custom Id</th>
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
                
                <tr>
                    <td><a href="{{url('video-data')}}">-02ZwQ452kg</a></td>					
                    <td>Title</td>
                    <td>A140341104121628</td>
                    <td></td> 
                    <td></td> 
                    <td>BLACKMANDALA</td> 
                    <td></td> 
                    <td>10</td>    
                    <td>5.3</td>
                    <td></td>
                    <td><a href="{{url('video-data')}}" class="btn btn-sm btn-info" title="View Video Detail"><i class="fa-solid fa-eye"></i></a> 
                        <a class="btn-sm btn btn-primary" title="Edit Video Detail" href="{{url('video-edit')}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
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