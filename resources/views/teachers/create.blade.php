@extends('layouts.app')
@section('content')
<form method="POST" action="/posts" enctype="multipart/form-data">
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
  <div class="form-group">Title
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control"  name="name" placeholder="name">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Email</label>
    <textarea class="form-control" id="content" rows="3" name="email" placeholder="email"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Password</label>
    <unput type="passw" class="form-control" id="content" rows="3" name="password" placeholder="password"></textarea>
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