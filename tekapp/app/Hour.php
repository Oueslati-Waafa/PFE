<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    //
    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function courses()
    {
        return $this->belongsToMany('App\course');
    }

    public function professors()
    {
        return $this->belongsToMany('App\professor');
    }

    public function courseHourProfessor()
    {
        return $this->hasMany('App\CourseHourProfessor', 'hour_id','id');
    }
}
