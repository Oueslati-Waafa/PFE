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

    public function professor()
  {
    return $this->belongsTo(professor::class);
  }

}
