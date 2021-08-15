<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professors extends Model
{
    public static function getFromUserId($user_id)
    {
        $professors = professors::all();
        $ans = null;
        foreach ($professors as $professor) {
            if ($professor->user_id == $user_id)
                $ans = $professor;
        }
        return $ans;
    }

    public function user()
    {
        return $this->belongsTo("App\User")->with("name");
    }
}
