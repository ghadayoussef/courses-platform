<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body','student_id' ,'course_id' ,'status'];
    
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}


