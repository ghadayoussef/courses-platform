@extends('layouts.dashboard')
@section('content')
<form method="POST" action="/teacher/{{$teacher->id}}"enctype="multipart/form-data">
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
    <input type="text" class="form-control" name="name" value="{{$teacher->name}}"/>
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" name="email" value="{{$teacher->email}}"/>
    <label for="exampleFormControlInput1">National ID</label>
    <input type="text" class="form-control" name="national_id" value="{{$teacher->national_id}}"/>
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" class="form-control" name="password" value="{{$teacher->password}}"/>
    <div class="form-group">
        <div class = "custom-file">
        <input type="file" class="custom-file-input" name="avatar" value="{{ $teacher->avatar }}"><br>
        <label class="custom-file-label">Choose file</label>
    </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  @method('patch')
</form>


@endsection