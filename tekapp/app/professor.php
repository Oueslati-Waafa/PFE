<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    public static function getFromUserId($user_id)
    {
        $professors = professor::all();
        $ans = null;
        foreach ($professors as $professor) {
            if ($professor->user_id == $user_id)
                $ans = $professor;
        }
        return $ans;
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function courses()
    {
        return $this->belongsToMany('App\course');
    }

}
