@extends('layouts.dashboard')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h4 class="text-dark"> Edit Course: <h4>

<form method="POST" action="/courses/{{$course->id}}" enctype="multipart/form-data">
@method('patch')
 @csrf
  <div class="form-group">
    <label>Course Name</label>
    <input value="{{$course->name}}" name="name" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label>Cover Image</label>
    <input  name ="image" type="file" class=" btn form-control-file" accept="image/jpg,image/png">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input value="{{($course->price)/100}}" name ="price" type="number" step="0.01" class="form-control" id="exampleInputPassword1">
  </div>
  
  <div class="form-group">
    <label>Start Date</label>
    <input value="{{$course->start_date}}" name="start_date" type="date" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label>End Date</label>
    <input value="{{$course->end_date}}" name="end_date" type="date" class="form-control" id="exampleInputPassword1">
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
@endsection