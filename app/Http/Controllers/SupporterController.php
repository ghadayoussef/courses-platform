<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Course;
use Illuminate\Database\Eloquent\Model;
class SupporterController extends Controller
{  
     function index(){
        $supporter = User::findOrFail(12);
        $supporters = User::get()->where('role','Supporter');
    
        return view('supporters.index', ['supporters' =>  $supporters]);

    }
    function destroy($id){
        
        $supporter = User::findOrFail($id);
        $supporter->delete();
        return redirect()->route('supporters.index');

    }
     function show($id){
        $supporter = User::findOrFail($id);
        return view('supporters.show',['supporter' =>  $supporter]);

    }

     function create(){
        return view('supporters.create');
    }
    function store(){
        $supporter=User::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'national_id'=>request()->national_id,
            'password'=>request()->password,
            'role'=>'Supporter'

        ]);
        $supporter->assignRole('Supporter');
        $course= Course::get()->where('name',request()->assign_supporter);
        $supporter->courses()->sync($course);
    
        return redirect()->route('supporters.index');
    
    }
    function edit($id){
        
        $supporter = User::findOrFail($id);
        return view('supporters.edit',['supporter' =>  $supporter]);

    }
    
    function update($id){
        $supporter = User::findOrFail($id);
        $supporter->name=request()->name;
        $supporter->email=request()->email;
        $supporter->national_id=request()->national_id;
        $supporter->password=request()->password;
        $supporter->save();
        return redirect()->route('supporters.index');

    }

  
}
