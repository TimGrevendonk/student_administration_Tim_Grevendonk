<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function programme(){
        // a student belong so a programme
        return $this->belongsTo("App\Programme");
    }

    public function studentcourses(){
        // a student follows many student courses
        return $this->hasMany("App\StudentCourse");
    }
}
