<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class SupporterController extends Controller
{  
     function index(){
        $supporter = User::findOrFail(12);
        $supporters = User::get()->where('role','Supporter');
    
        return view('supporters.index', ['supporters' =>  $supporters]);

    }
    function destroy($id){
        
        $supporter = User::findOrFail($id);
        if($upporter['image'])
        {
            
        unlink(public_path()."/storage/".$supporter['image']); //delete image from storage
      
        }
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
    function store(Request $request){
       

        $supporter=User::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'national_id'=>request()->national_id,
            'password'=> Hash::make(request()->password),
            'role'=>'Supporter'

        ]);

        if(request()->avatar){
            $supporter->update(['image'=>$request->file('avatar')->store('uploads','public')]);
            }
          else
          $supporter->update(['image'=>'/storage/uploads/default.jpeg']);
       
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
        if(request()->avatar){
            unlink(public_path()."/storage/".$supporter['avatar']);
            $supporter->update(['avatar'=>request()->file('avatar')->store('uploads','public')]);
         }
        else{
            if($supporter->avatar){
            unlink(public_path()."/storage/".$supporter['avatar']); 
        }
        else
          $supporter->update(['image'=>'/storage/uploads/default.jpeg']);
    
    }
        $supporter->save();
        return redirect()->route('supporters.index');

    }

  
}
