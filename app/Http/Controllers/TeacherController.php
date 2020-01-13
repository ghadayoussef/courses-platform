<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class TeacherController extends Controller
{
    function index()
    {
        return view('teachers.index',['teachers' => User::all()]);
        //return view('teachers.index',['teachers' => User::where('role','=','teacher')]);
    }
    //form for teacher 
    function create(){
        return view('users.create');
    }
    function store(StoreUserRequest $request){
        $teacher = new User();
        $teacher->name = $request->name;
        $techer->email = $request->email;
        $techer->user_id = $request->teacher()->id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time(). "." .$extension;
            $file->move("uploads/teacher/",$filename);
            $teacher->image = $filename;
        }else{
           
            $teacher->image = "";
        }
        $teacher->save();
        return redirect()->route('teachers.index');
        }
        function show($id){
            $teacher = User::find($id);
            return view('techers.show',['teacher' =>$teacher]);
        }
        function destroy($id){
            $teacher = User::destroy($id);
           return redirect()->route('teachers.index');
        }
        function edit($id){
            $post = User::find($id);
            return view('teachers.edit',['teacher' => $teacher]);
            
        }
        function update(StoreUserRequest $request,$id){
            $teachre = User::find($id)->firstOrFail();
            $teacher->update(['name' => $request->title,
                            'email' => $request->content]);
    
            return redirect()->route('teachers.index');
    
        }
        function upload(StoreUserRequest $request){

            $this->validate($request,['select_file' =>'required|image|mimes:jpeg,jpg,png,gif|max:2048']);
            $image = $request->file('select_file');
        }

}
