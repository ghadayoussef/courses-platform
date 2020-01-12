<?php

namespace App;
use App\User;
use App\Student;
use App\Comment;


use Illuminate\Database\Eloquent\Model;

class Course extends Model 
{

    public function user(){
        return $this-> belongsToMany(User::class);
    }
    public function students(){
        return $this-> belongsToMany(Student::class,'students_courses','course_id','student_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected $fillable = [
        'name', 'price', 'start_date','end_date','image','teacher_id','supporter_id'
    ];
    
}