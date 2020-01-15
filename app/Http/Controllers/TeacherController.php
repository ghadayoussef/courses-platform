<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use File;
use App\Http\Requests\StoreUserRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    function index()
    {
        return view('teachers.index',['teachers' => User::where('role','Teacher')->get()]);
    }
    function create(){
        return view('teachers.create');
    }

    function store(StoreUserRequest $request){
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->national_id = $request->national_id;
        $teacher->role = "Teacher";
        $teacher->assignRole('Teacher');
    
        $teacher->save();
        if(request()->avatar){
            $teacher->update(['avatar'=>$request->file('avatar')->store('uploads','public')]);
            }
        return redirect()->route('teachers.index');
        }

        function show($id){
            $teacher = User::find($id);
            return view('teachers.show',['teacher' =>$teacher]);
        }

        function destroy($id){
           
            $teacher = User::destroy($id);
            return redirect()->route('teachers.index');
        }

        function edit($id){
            $teacher = User::find($id);
            return view('teachers.edit',['teacher' => $teacher]);
            
        }

        function update(StoreUserRequest $request,$id){
            $teacher = User::findOrFail($id);
            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->password = bcrypt($request->password);
            $teacher->national_id = $request->national_id;
            $teacher->role = "Teacher";
            $teacher->assignRole('Teacher');
            if( $request->avatar){
                unlink(public_path()."/storage/".$teacher['avatar']);
                $teacher->update(['avatar'=> $request->file('avatar')->store('uploads','public')]);
             }
            else{
                if($teacher->avatar)
                unlink(public_path()."/storage/".$teacher['avatar']); 
            
            else
              $teacher->update(['avatar'=>'/storage/uploads/default.jpeg']);
            }    
            $teacher->save();
           
            return redirect()->route('teachers.index');    
        }
    }