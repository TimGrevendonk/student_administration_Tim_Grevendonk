<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public function students(){
        // a programme has many students
        return $this->hasMany("App\Student");
    }

    public function courses(){
        // a programme has many courses
        return $this->hasMany("App\Course");
    }
}
