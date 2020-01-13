@extends('layouts.app')
@section('content')

<h1 class="text-dark">{{$courses->name}}<h1>
<td> <img style="width:1000px;height:500px;" src="/storage/upload/{{$courses->image}}" alt="no-img"> </td>
<h3 class="text-danger">{{($courses->price)/100}}$<h3>
<h3>{{$courses->start_date}}<h3>
<h3>{{$courses->end_date}}<h3>
@endsection