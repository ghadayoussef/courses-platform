<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    protected $fillable = [
        'name', 'image', 'price','user_id','national_id'
    ];




    function users(){

        return $this->belongsToMany(User::class,'course_user');    }
}
