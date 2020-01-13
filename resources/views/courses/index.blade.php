@extends('layouts.dashboard')
@section('content')
<div> 
@role('Admin|Teacher')
<a class="btn btn-success btn-lg" style="align:center;" href="courses/create" role="button">Create Course</a>
@endrole
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
                      @role('Admin')
                      <th>Teacher Name<th>
                      @endrole
                      <th>Actions<th>
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
            @hasrole('Admin')
            @foreach($course->user as $user)
            @if($user->role=='Teacher')
           <td>{{ $user->name }}</td>
           @endif
            @endforeach
           @endhasrole
            <td><a class="btn btn-primary"href="{{route('courses.show', $course->id)}}">View</a>
           @role('Admin|Teacher')
           <a  class="btn btn-warning" href="{{route('courses.edit',$course->id )}}">Edit</a>
<form style="display:inline">
<button class="delete btn btn-danger" data-id="{{$course->id}}" >Delete</button>
</form>
</td>
@endrole

          </tr>
@endforeach
   </tbody>
</table>
@endsection
@section('scripts')
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>
$(".delete").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "/courses/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("deleted");
        }
    });
   
});
</script>
@endsection