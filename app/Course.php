<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function programme(){
        // a course belongs to 1 programme
        return $this->belongsTo("App\programme");
    }

    public function studentcourses() {
        // a course has many students
        return $this->hasMany("App\StudentCourse");
    }
}
