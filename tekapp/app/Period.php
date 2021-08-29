<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{

    //relationship with Period table
    public function session()
  {
    return $this->belongsTo('App\Session');
  }

  public function weeks()
  {
      return $this->hasMany(Week::class);
  }

  
}
