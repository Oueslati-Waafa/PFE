<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class Administrator extends Model
{
    use LaratrustUserTrait;
    //
    public function user()
    {
        return $this->belongsTo("App\User")->with("image");
    }


    public static function validate($id)
    {
        if (!Administrator::find($id))
            return response()->json(["error" => "Administrator is not found"], 404);
    }

    public static function getByUserId($user_id)
    {
        User::validate($user_id);
        $admin = Administrator::where("user_id", $user_id)->first();
        return $admin;
    }

}
