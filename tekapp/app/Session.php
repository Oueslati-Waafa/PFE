<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $appends = ['academic_year'];

    public function getAcademicYearAttribute()
    {
      $startYear = explode('-', $this->start_date)[0];
      $endYear = explode('-', $this->end_date)[0];
  
      if (strcmp($startYear, $endYear) == 0)
        return $startYear;
      return implode([$startYear, $endYear], '-');
    }
  
    public function periods()
    {
      return $this->hasMany("App\Period")->with(["course_plans"]);
    }
  
    public function _periods()
    {
      return $this->hasMany("App\Period");
    }


    public function getFirstPeriod()
  {
    return Period::where('session_id', $this->id)->orderBy('start_date')->first();
  }

   //my methods
   public static function validate($id)
   {
     $session = Session::find($id);
     if (!$session) return response()->json(["error" => "Session not found"], 404);
   }
 
   public static function getLastSession()
   {
     return Session::orderBy('start_date', 'desc')->first();
   }
 
   public static function lastSession()
   {
     return Session::orderBy('start_date', 'desc');
   }
 
}
