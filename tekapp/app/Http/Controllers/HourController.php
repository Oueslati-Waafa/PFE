<?php

namespace App\Http\Controllers;

use App\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
   //get all Hours
   public function getAllHours()
   {
       $hour = Hour::orderBy('type', 'desc')->with(['week',])->get();
       return response()->json([
         'hours' => $hour
       ]);
   }

   public function getHour($id)
   {
       $hour = Hour::find($id);
       return response()->json($hour);
   }

   public function updateHour(Request $request,$id)
   {
      $hour = Hour::where('id',$id)->first();
      $hour->heure_suive = $request->heure_suive;
      $hour->type = $request->type;
      $hour->week_id = $request->week_id;
  
  
      if ($hour -> save())
      {
          return response()->json(['status'=> true,'message'=> 'updated  Succesfully']);
          
      }
      else
      {
          return response()->json(['status => false', 'message'=> 'There is some problem']);
      }
   }

   public function deleteHour($id)
   {
       $hour = Hour::find($id);
       if($hour->delete())
       {
       return response()->json(['status'=> true, 'message'=>'La Semaine a été supprimer avec succés']);
       }
       else
       {
       return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
       }
   }

   public function saveHour(Request $request)
   {

     $hour = new Hour();
     $hour->heure_suive = $request->heure_suive;
     $hour->type = $request->type;
     $hour->week_id = $request->week_id;

     if ($hour -> save())
     {
         return response()->json(['status'=> true,'message'=> 'Hour Added Succesfully']);
         
     }
     else
     {
         return response()->json(['status => false', 'message'=> 'There is some problem']);
     }

   }
}
