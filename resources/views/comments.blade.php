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
    
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Body</th>
                  <th>Student</th>
                  <th>Course</th>
                  <th>Actions</th>
                   
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                  <td>{{$comment['id']}}</td>
                  <td> {{$comment['body']}}
                  </td>
                  <td>{{$comment['student_id']}}</td>
                  <td> {{$comment['course_id']}}</td>
                  @role('Admin|Teacher|Supporter')
                  <td> 
                
                  <a class="btn btn-success" href="/supporters/{{$comment['id']}}/approve" role="button" onclick='return confirm("Are you sure to approve this comment for public");'>Approve </a>
                  <a class="btn btn-dark" href="/supporters/{{$comment['id']}}/disapprove" role="button" onclick='return confirm("Are you sure to diapprove this comment");'>Disapprove </a>
 
                  </td>
                 
                  @endrole

                </tr>
                @endforeach
                </tbody>
                
              </table>
    </section>
    <!-- /.content -->
  </div>
@endsection