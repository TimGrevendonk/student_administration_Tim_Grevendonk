<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function programme(){
        // a course belongs to 1 programme
        return $this->belongsTo("App/Course");
    }

    public function studentcourses() {
        // a couse has many students
        return $this->hasMany("App/StudentCourse");
    }
}
