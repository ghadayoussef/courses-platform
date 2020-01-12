@extends('layouts.dashboard')
@section('content')
<table class="table">
<tr>
<td>Name</td>
<td>{{$teacher->name}}</td>
</tr>
<tr>
<td>Email</td>
<td>{{$teacher->email}}</td>
</tr>
<tr>
<td>National ID</td>
<td>{{$teacher->national_id}}</td>
</tr>
<tr>
<td>Avatar</td>
<td><img class="img-thumbnail" style="width:100px;height:100px;" src="{{ asset('uploads/teacher/' . $teacher->avatar) }}" /></td>
</tr>

</table>
@endsection