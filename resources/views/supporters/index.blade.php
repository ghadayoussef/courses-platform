@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supporters</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    @role('Admin|Teacher')
    <a href="/supporters/create" class="btn btn-success " tabindex="-1" role="button" aria-disabled="true">Add Supporter</a> 
      @endrole
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <div class="card-body" id="table">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>National ID</th>
                  <th>Avatar</th>
                  @role('Admin|Teacher')
                  <th>Actions</th>
                   @endrole
                </tr>
                </thead>
                <tbody>
                @foreach($supporters as $supporter)
                <tr>
                  <td>{{$supporter['id']}}</td>
                  <td> {{$supporter['name']}}
                  </td>
                  <td>{{$supporter['email']}}</td>
                  <td> {{$supporter['national_id']}}</td>
                  <td> 
                  @if($supporter['image'])
                  <img src="{{(asset('storage/'.$supporter['image']))}}"style="width: 150px; height: 150px ;float:right" >
                 @else
                 <img src="{{ asset('/storage/uploads/default.jpeg') }}"style="width: 150px; height: 150px ;float:right" >

                  @endif
                  </td>
                  @role('Admin|Teacher')
                  <td> 
                  <form>
                  <a href="/supporters/{{$supporter['id']}}/edit" class="btn btn-primary " tabindex="-1" role="button" aria-disabled="true">Edit</a> 
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <button  class="btn btn-danger deleteRecord" data-id={{$supporter['id']}} onclick='return confirm("Are you sure to delete this User?");'>Delete </button>
                  @if($supporter->isBanned())
                  <a href="/supporters/{{$supporter['id']}}/ban" class="btn btn-dark text-light" tabindex="-1" role="button" aria-disabled="true">UnBan</a> 
                   @else
                   <a href="/supporters/{{$supporter['id']}}/ban" class="btn btn-dark text-light" tabindex="-1" role="button" aria-disabled="true">Ban</a> 
                   @endif

                  </form>
                  </td>
                  @endrole

                </tr>
                @endforeach
                </tbody>
                
              </table>
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('scripts')
<script >
 $(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "/supporters/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
          $("#table").reload();
        }
    });
   
});
  
</script>
@endsection
