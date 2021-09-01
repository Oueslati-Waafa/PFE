<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
  public function professor()
    {
        return $this->belongsToMany('App\professor');
    }

  public function hours()
    {
        return $this->belongsToMany('App\Hour');
    }

    public function courseHourProfessor()
    {
        return $this->hasMany('App\CourseHourProfessor', 'course_id','id');
    }
}
