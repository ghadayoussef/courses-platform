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

<div> 
<a class="btn btn-success btn-lg" style="align:center;" href="courses/create" role="button">Create Course</a>
</div>
<table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Course Name</th>
                      <th>Created At</th>
                      <th>Cover Image</th>
                      <th>Price</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Teacher Name<th>
                    </tr>
                  </thead>
                  <tbody>
@foreach($courses as $course)  
        <tr>
            <td>{{$course->name}}</td>
            <td>{{ date('Y-m-d', strtotime($course->created_at)) }}</td>

            <td> <img style="width:200px;height:150px;" src="/storage/upload/{{$course->image}}" alt="no-img"> </td>

            <td> <p class="text-danger">{{($course->price)/100}}$<p></td>
            <td>{{$course->start_date}}</td>
            <td>{{$course->end_date}}</td>
            @foreach($course->user as $user)
            @if($user->role=='Teacher')
           <td>{{ $user->name }}</td>
           @endif
            @endforeach
            <td><a class="btn btn-primary"href="{{route('courses.show', $course->id)}}">View</a>

           <a  class="btn btn-warning" href="{{route('courses.edit',$course->id )}}">Edit</a>
        <form style="display:inline;" action="{{ route('courses.destroy', $course->id)}}" method="post">
  <input onclick='return confirm("Are you sure?")' class="btn btn-danger" type="submit" value="Delete" />
   @method('delete')
   @csrf
   </form>
</td>

          </tr>
@endforeach
   </tbody>
</table>

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