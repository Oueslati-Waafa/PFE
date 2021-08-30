<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }
}
