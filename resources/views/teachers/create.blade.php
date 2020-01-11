@extends('layouts.app')
@section('content')
<form method="POST" action="/teachers" enctype="multipart/form-data">
@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control"  name="name" placeholder="name">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Email</label>
    <input type="text" class="form-control" name="email" placeholder="email">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">National ID</label>
    <input type="number" class="form-control" name="national_id" placeholder="National ID">
  </div>

  <div class="form-group" >
  <div class = "custom-file">
  <input type="file" class="custom-file-input" name="avatar"><br>
  <label class="custom-file-label">Choose file</label>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection