<?php

namespace App\Http\Controllers;

use App\Period;
use App\Session;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function savePeriod(Request $request)
    {
        /*session = Session::find(1);
        $period = new Period();
        $period->name = $request->name;
        $period->start_date = $request->start_date;
        $period->end_date = $request->end_date;
        $session->_periods()->save($period);*/
      $period = new Period();
      $period->name = $request->name;
      $period->start_date = $request->start_date;
      $period->end_date = $request->end_date;
      $period->session_id = $request->session_id;

      

      if ($period -> save())
      {
          return response()->json(['status'=> true,'message'=> 'Period Added Succesfully']);
          
      }
      else
      {
          return response()->json(['status => false', 'message'=> 'There is some problem']);
      }

    }

public function getAllPeriods()
{
   /* $period = Period::find($id);
    $session = $period->session;
    dd($session->name);
    return $period;*/
    $sessions = Period::select('id','name','start_date','end_date','session_id')->with('session:id,name')->get();
    return $sessions;
}

public function updatePeriod()
{
    
}
public function getPeriod($id)
{
    $period = Period::find($id);
    return $period;
}
public function deletePeriod($id)
{
    $period = Period::find($id);
     if($period->delete())
     {
       return response()->json(['status'=> true, 'message'=>'Period a été supprimer avec succés']);
     }
     else
     {
     return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
     }
}
}
