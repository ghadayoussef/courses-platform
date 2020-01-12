<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    function update (Request $request){
    $id= $request->user()->id;
    $student = Student::find($id);
    if($request->name)
    $student->name = $request->name;
    if ( request()->email)
    $student->email = request()->email;
    if($request->gender)
    $student->gender=$request->gender;
    if ($request->birthdate)
    $student->DOB= date('Y-m-d',strtotime($request->birthdate));
    if ($request->avatar)
    $student->avatar=$request->avatar;
    if($request->password)
    $student->password=$request->password;

    $student->id = $request->user()->id;
    $student->save();
    return response()->json(['message'=>'Profile Updated Successfully', $student]);
    
}
}