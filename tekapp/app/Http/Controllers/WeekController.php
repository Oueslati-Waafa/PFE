<?php

namespace App\Http\Controllers;

use App\Week;
use Illuminate\Http\Request;

class WeekController extends Controller
{
    //get all weeks
    public function getAllWeeks()
    {
        $weeks = Week::orderBy('date_fin', 'desc')->with(['period',])->get();
        return response()->json([
          'weeks' => $weeks
        ]);
    }

    public function getweek($id)
    {
        $week = Week::find($id);
        return response()->json($week);
    }

    public function updateWeek(Request $request,$id)
    {
       $week = Week::where('id',$id)->first();
       $week->date_debut = $request->date_debut;
       $week->date_fin = $request->date_fin;
       $week->period_id = $request->period_id;
   
   
       if ($week -> save())
       {
           return response()->json(['status'=> true,'message'=> 'updated  Succesfully']);
           
       }
       else
       {
           return response()->json(['status => false', 'message'=> 'There is some problem']);
       }
    }

    public function deleteWeek($id)
    {
        $week = Week::find($id);
        if($week->delete())
        {
        return response()->json(['status'=> true, 'message'=>'La Semaine a été supprimer avec succés']);
        }
        else
        {
        return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
        }
    }

    public function saveWeek(Request $request)
    {

      $week = new Week();
      $week->date_debut = $request->date_debut;
      $week->date_fin = $request->date_fin;
      $week->period_id = $request->period_id;;

      if ($week -> save())
      {
          return response()->json(['status'=> true,'message'=> 'week Added Succesfully']);
          
      }
      else
      {
          return response()->json(['status => false', 'message'=> 'There is some problem']);
      }

    }

}
