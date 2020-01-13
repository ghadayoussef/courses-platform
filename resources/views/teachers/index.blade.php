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
      
      <td><img class="img-thumbnail" style="width:100px;height:100px;" src="{{ asset('uploads/teacher/' . $teacher->avatar) }}" /></td>
      <td>{{$teacher['national_id']}}</td>
        
      <!--         
        <form action="{{route('teachers.destroy',['teacher' => $teacher['id']])}}" method="post">
        <a class="btn bg-info" style="align" href="{{route('teachers.edit',['teacher' => $teacher['id']])}}" role="button">Edit</a>
        <a class="btn btn-primary" style="align" href="{{route('teachers.show',['teacher' => $teacher['id']])}}" role="button">Show</a>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <button type="submit" class="btn bg-danger" data-id="{{$teacher['id']}}" id="delete"
        onclick='return confirm("Are you sure you want to delete this data?")' >Delete</button>
       @method('delete')
       @csrf
        </form>  -->
        <td>
          <form>
        <a class="btn bg-info" style="align" href="{{route('teachers.edit',['teacher' => $teacher['id']])}}" role="button">Edit</a>
        <a class="btn btn-primary" style="align" href="{{route('teachers.show',['teacher' => $teacher['id']])}}" role="button">Show</a>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <button  class="btn btn-danger deleteRecord" data-id= "{{$teacher['id']}}">Delete </button>
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}">
        <button class="btn bg-danger" data-id="{{$teacher['id']}}" id="delete">Delete</button> -->
       <!-- @method('delete')
       
        @csrf  -->
            </form>       
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


    $.ajax({ url: `/teachers/${$(this).data("id")}`, method: "DELETE" })
            .then(function (data) {
              console.log("it Works");
            })
            .catch(function (err) {
              console.log("error hena");
            });

    // $.ajax(
    // {
    //     url: "/teachers/"+id,
    //     type: "POST",
    //     // data: {
    //     //     "id": id,
    //     //     "_token": token,
    //     // },
    //     data: {
    //       "id": id ,
    //       _method: "DELETE"
    //       },
    //     headers: {
    //       'X-CSRF-TOKEN': token
    //        },
    //     success: function (){
    //       console.log("it Works");
    //     },
    //     error: function() {             
    //        console.log('error');
    //     }
    // });
   
})












</script>
@endsection









<!-- @section('scripts')
<script>  
$(#delete).on('click',function(){
    var id = $(this).data('id');
    var token = $("meta[name='csrf-token']").attr("content");
    if(confirm("Are you sure you want to delete this data?")){
            $.ajax({
              url:"/teachers/"+id,
              type: 'DELETE',
              "data":id,
              "_token": token,
              success:function(data){
                console.log("it Works");
                //alert(data);               
              }
            })
          }
        })
</script>
@endsection('scripts') -->