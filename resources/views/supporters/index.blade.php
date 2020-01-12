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
    <a href="/supporters/create" class="btn btn-success " tabindex="-1" role="button" aria-disabled="true">Add Supporter</a> 
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>National ID</th>
                  <th>Avatar</th>
                  <th>Actions</th>
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
                  <td> 
                  <form  method="post" action="/supporters/{{$supporter['id']}}">
                  @csrf
                  @method('delete')
                  <a href="/supporters/{{$supporter['id']}}/edit" class="btn btn-primary " tabindex="-1" role="button" aria-disabled="true">Edit</a> 
                  <button type="submit" class="btn btn-danger " onclick='return confirm("Are you sure to delete this post?");'>Delete </button>
                  </form>
                  </td>

                </tr>
                @endforeach
                </tbody>
                
              </table>
    </section>
    <!-- /.content -->
  </div>

@endsection

