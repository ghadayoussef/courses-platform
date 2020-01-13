@extends('layouts.app')
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
      <td>{{$teacher['avatar']}}</td>
      <td>{{$teacher['NationalID']}}</td>
      <td>
        
        <form action="{{route('teachers.destroy',['teacher' => $teacher['id']])}}" method="post">
        <button type="submit" class="btn bg-danger" >Delete</button>
       @method('delete')
       @csrf
        </form>

       

      </td>
      

        
    </tr>
    @endforeach
  </tbody>
</table>
@endsection('content')