<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Course;
use App\Student;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Storage;
use View;
class CourseController extends Controller
{
    public function index(){
        if(Auth::user()->role=='Admin'){
            $courses=Course::all();

        }
        else{
            $courses= Auth::user()->courses()->get();

        }
        
        return view('courses.index', ['courses' => $courses]);
        }
    public function create(){
        $teachers=User::role('Teacher')->get();
        $supporters=User::role('Supporter')->get();

        return View::make('courses.create', ['teachers'=>$teachers,'supporters'=> $supporters]);
    }
    public function store(StoreCourseRequest $request){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $extension=$request->file('image')->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->storeAs('public/upload',$filename);
            }
      
            $course = new Course;
            $course->name = $request->name;
            $course->price= 100*($request->price);
            $course->start_date=$request->start_date;
            $course->end_date=$request->end_date;
            $course->image = $filename;
            $course->save();
            if(Auth::user()->role=='Teacher')
            {
                $teacher_id = Auth::user()->id;
            }
            elseif(Auth::user()->role=='Admin')
            {
                $teacher_id=$request->teacher_id;
            }
            $supporter_id=$request->supporter_id;
            $course->user()->attach($teacher_id);
            $course->user()->attach($supporter_id);
            return redirect('/courses');
    
    
        }
        function show($id){
            $course = Course::find($id);
            return view('courses.show', ['courses' => $course]);
    

        }
   

        public function destroy($id){
           $course = Course::where('id','=',$id)->firstOrFail();
           $user= new User;
            $course-> user()->detach();
            $course->destroy($id);
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
       
        }
        function edit($id){
            $teachers=User::role('Teacher')->get();
            $supporters=User::role('Supporter')->get();
            $course = Course::find($id);
            return view('courses.edit',[
                'course'=>$course,'teachers'=>$teachers,'supporters'=> $supporters]);
        }
        function update(UpdateCourseRequest $request,$id){
            $course = Course::findOrFail($id);
            if($request->hasFile('image')){
                $file=$request->file('image');
                $extension=$request->file('image')->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->storeAs('public/upload',$filename);
            }
      
            $course->name = $request->name;
            $course->price= 100*($request->price);
            $course->start_date=$request->start_date;
            $course->end_date=$request->end_date;
            $course->image = $filename;
            $course->teacher_id =$request->user()->id;
            $course->save();
         
            return redirect()->route('courses.index');
            
    
        }
        
    }

