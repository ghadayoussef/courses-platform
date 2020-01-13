<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function user(){
        return $this-> belongsToMany(User::class);
    }
    public function student(){
        return $this-> belongsToMany(Student::class);
    }
    protected $fillable = [
        'name', 'price', 'start_date','end_date','image','teacher_id'
    ];
    
}
