<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 


class SupporterController extends Controller
{
    public function index(){
        $supporters = User::get()->where('role','supporter');
       
        return view('supporters.index', ['supporters' =>  $supporters]);

    }

  
}
