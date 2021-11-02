<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    public function students(){
        // a student belongs to 1 student course
        return $this->belongsTo("App\Student");
    }

    public function courses(){
        // a course belongs to 1 student course
        return $this->belongsTo("App\Course");
    }
}
