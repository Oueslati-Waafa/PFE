<?php

namespace App\Http\Controllers;

use App\Period;
use App\Session;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function savePeriod(Request $request)
    {

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
        $period = Period::orderBy('end_date', 'desc')->with(['session',])->get();
        return response()->json([
          'periods' => $period
        ]);
    }

 public function updatePeriod(Request $request,$id)
 {
    $period = Period::where('id',$id)->first();
    $period->name = $request->name;
    $period->start_date = $request->start_date;
    $period->end_date = $request->end_date;
    $period->session_id = $request->session_id;

    if ($period -> save())
    {
        return response()->json(['status'=> true,'message'=> 'updated  Succesfully']);
        
    }
    else
    {
        return response()->json(['status => false', 'message'=> 'There is some problem']);
    }
 }
public function getPeriod($id)
{
    $period = Period::find($id);
    return response()->json($period);
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
