@extends('layouts.dashboard')
@section('content')

@if(auth()->user()->isBanned())
<center>
        <h1> you are banned from system</h1>
        </center>
        @endif
@endsection
