<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseHourProfessor extends Model
{
    public $timestamps = false;
    
    public function professor()
    {
        return $this->belongsTo('App\professor', 'professor_id');
    }

    public function course()
    {
        return $this->belongsTo('App\course', 'course_id');
    }


    public function week()
    {
        return $this->belongsTo('App\Week', 'week_id');
    }
}
