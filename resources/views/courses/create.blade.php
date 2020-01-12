
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 3</title>


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h4 class="text-dark"> Create New Course: <h4>

<form method="POST" action="/courses" enctype="multipart/form-data">
 @csrf
  <div class="form-group">
    <label>Course Name</label>
    <input name="name" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label>Cover Image</label>
    <input name ="image" type="file" class=" btn form-control-file" accept="image/jpg,image/png">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input name ="price" type="number" step="0.01" class="form-control" id="exampleInputPassword1">
  </div>
  
  <div class="form-group">
    <label>Start Date</label>
    <input name="start_date" type="date" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label>End Date</label>
    <input name="end_date" type="date" class="form-control" id="exampleInputPassword1">
  </div> 
  <div class="form-group">
    <label>Select Teacher</label>
    <select name="teacher_id" class="mdb-select md-form">
  <option value="" disabled selected>Choose Teacher</option>
  @foreach($teachers as $teacher)
  <option value="{{$teacher->id}}">{{$teacher->name}}</option>
  @endforeach
</select>
  </div> 
  <div class="form-group">
    <label>Select Supporter</label>
    <select name="supporter_id" class="mdb-select md-form">
  <option value="" disabled selected>Choose Supporter</option>
  @foreach($supporters as $supporter)
  <option value="{{$supporter->id}}">{{$supporter->name}}</option>
  @endforeach
</select>
  </div> 

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- jQuery -->
<script src="{{asset('bower_components/admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('bower_components/admin-lte/dist/js/adminlte.js')}}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('bower_components/admin-lte/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('bower_components/admin-lte/dist/js/demo.js')}}"></script>
<script src="{{asset('bower_components/admin-lte/dist/js/pages/dashboard3.js')}}"></script>
</body>
</html>