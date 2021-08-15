<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weeks_hours extends Model
{
    public function courses()
    {
        return $this->belongsToMany(course::class);
    }
}
