<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    public function student(){
        // a student belongs to 1 student course
        return $this->belongsTo("App\Student")->withDefault();
    }

    public function course(){
        // a course belongs to 1 student course
        return $this->belongsTo("App\Course")->withDefault();
    }
}
