@extends('layouts.dashboard')
@section('content')
<form class="form-inline my-2 my-lg-0" method="POST">
  @csrf
  <a class="btn btn-outline-success my-2 my-sm-0" href="{{route('teachers.create')}}" role="button">Create</a>
</form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">avatar</th>
      <th scope="col">NationalID</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($teachers as $index => $teacher)
    <tr>
    <th scope="row">{{$teacher['id']}}</th>      
      <td>{{$teacher['name']}}</td>
      <td>{{$teacher['email']}}</td>
      
      <td>
      @if($teacher['avatar'])
                  <img src="{{(asset('storage/'.$teacher['avatar']))}}"style="width: 150px; height: 150px ;float:right" >
                 @else
                 <img src="{{ asset('/storage/uploads/default.jpeg') }}"style="width: 150px; height: 150px ;float:right" >

                  @endif      </td>
      <td>{{$teacher['national_id']}}</td>
        
   
        <td>
          <form>
        <a class="btn bg-info" style="align" href="{{route('teachers.edit',['teacher' => $teacher['id']])}}" role="button">Edit</a>
        <a class="btn btn-primary" style="align" href="{{route('teachers.show',['teacher' => $teacher['id']])}}" role="button">Show</a>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <button  class="btn btn-danger deleteRecord" data-id= "{{$teacher['id']}}" onclick='return confirm("Are you sure to delete this User?");'>Delete </button>
    
                </from>       
      </td> 
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
@section('scripts')
<script >
 $(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax(
    {
        //url:"{{route('teachers.destroy',['teacher' => 'id'])}}",
        url: "/teachers/"+$(this).data("id"),
        type: 'DELETE',
        data: {
            "id": $(this).data("id"),
            "_token": $("meta[name='csrf-token']").attr("content"),
        },
        success: function (){
          console.log("it Works");
        },
        error: function() {             
           alert("errrorrr");
        }
    });
   
});
</script>
@endsection





 
