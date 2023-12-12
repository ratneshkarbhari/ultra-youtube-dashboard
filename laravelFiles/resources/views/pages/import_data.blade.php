<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <h2>Import Video Data</h2>

    <p class="text-success">{{$success}}</p>
    <p class="text-danger">{{$error}}</p>

    <form action="{{ url('import-video-data-exe') }}" enctype="multipart/form-data" method="post">

        @csrf
        <label for="monthSelect">Select Month</label>

        <select name="monthSelect" id="monthSelect" class="form-select form-select mb-3" >

            <option selected>Select a month</option>

            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
            
        </select>

        <label for="yearSelect">Select Year</label>

        <select name="yearSelect" id="yearSelect" class="form-select form-select mb-3" >

            <option selected>Select a Year</option>

            @for($i=2023;$i<=2099;$i++)
            <option value="{{$i}}">{{$i}}</option>

            @endfor
            
        </select>

        <div class="mb-3">
            <label for="videoData" class="form-label">Video Data</label>
            <input class="form-control" type="file" id="videoData" name="videoData">
        </div>

        <button type="submit" class="btn btn-success">Import</button>

    </form>

</main>