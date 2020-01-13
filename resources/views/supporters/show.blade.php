@extends('layouts.dashboard')
@section('content')
<center>
<div class="card m-5"  style="width:500px; position:absolute;left:30%"> 
  <div class="card-header bg-light " >
   <h2>{{$supporter->name}}</h2>
  </div>

  <div class="card-body">
    <h5 class="card-title"> <span class="font-weight-bold">Email:</span>{{$supporter->email}}</h5><br>
    <h5 class="card-title"><span class="font-weight-bold">National ID:</span>{{$supporter->national_id}}</h5>
    @if($supporter['image'])
  <img src="{{(asset('storage/'.$supporter['image']))}}"style="width: 150px; height: 150px ;float:right" >
  
  @endif
  </div>
</div>

</center>
@endsection