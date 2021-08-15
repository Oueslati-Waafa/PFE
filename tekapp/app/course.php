<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    public function weeks_hours()
    {
        return $this->belongsToMany(weeks_hours::class);
    }
}
