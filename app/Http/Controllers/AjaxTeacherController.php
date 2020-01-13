<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Illuminate\Http\Request;

class AjaxTeacherController extends Controller
{
    function index()
    {
        return view('teachers.ajax_index',['teachers' => User::get()->where('role','Teacher')]);
    }
    function getdata(){
        $teachers = User::select('id','name','email','avatar','national_id');
        return DataTables::of($teachers)->addColumn('action',function($teacher){
            return '<a href = "#" class = "btn btn-xs btn-primary edit"id="'.$teacher->id.'"><i class="glyphicon
            glyphicon-edit"></i>Edit</a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a href = "#" class = "btn btn-xs btn-danger delete"id="'.$teacher->id.'"><i class="glyphicon
            glyphicon-remove"></i>Delete</a>';
        })->make(true);
    }

    function removedata($id){
        echo($id);
        $teacher = User::find($id);
        dd($teacher);
        if($teacher->delete()){
            echo 'data deleted';
        }
    }
}
