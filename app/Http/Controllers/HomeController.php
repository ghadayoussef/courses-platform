<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Comment;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        

        return view('home');
    }
    public function showComments(){
        $comments=Comment::get()->where('status',0);
        $userComments=coursesComments($comments);
       
        return view('comments',['comments'=>$userComments]);
        


    }
    public function approveComment($id){
        $comment=Comment::findOrFail($id);
        $comment->update(['status'=>1]);
         return back();

    }
    public function disApproveComment($id){
        $comment=Comment::findOrFail($id);
        $comment->delete();
        return back();


    }
}
