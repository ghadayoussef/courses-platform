<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Comment;
use App\User;
use App\Notifications\CourseEnrolled;
use App\Http\Resources\CourseResource;



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
    return response()->json(['message'=>'Profile Updated Successfully','student_info'=> $student]);

}

public function showCourses(){

    return CourseResource::collection(Course::all());
}

public function enroll(request $request,$courseId){

    $course = Course::find($courseId);
    $student = $request->user();
    $student->courses()->attach($courseId);
    $student->notify(new CourseEnrolled($course));
    return response(['message'=>'Successfully enrolled in '.$course->name.' Course. Please check your email.']);

}

public function enrolledCourses(request $request){
    $courses = $request->user()->courses()->get();
    return CourseResource::collection($courses);
}

public function comment(request $request,$courseId){
    
    $course = Course::find($courseId);
    $student = $request->user();
    $comment= Comment::create([
        'body' => $request->comment,
        'student_id' => $student->id,
        'course_id' => $course->id,
        'status' => 0,
      ]);
return response(['message'=>'Your comment has been sent and awaiting for approval']) ;
}

}
