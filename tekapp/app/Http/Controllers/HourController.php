<?php

namespace App\Http\Controllers;

use App\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
   //get all Hours
   public function getAllHours()
   {
       $hour = Hour::orderBy('type', 'desc')->with(['week','professor.user'])->get();
       return response()->json([
         'hours' => $hour
       ]);
   }

   //get Hour
   public function getHour($id)
   {
    $hour = Hour::with(['week','professor.user'])->find($id);
    return response()->json($hour);
   }

   public function updateHour(Request $request,$id)
   {
      $hour = Hour::where('id',$id)->first();
      $hour->heure_suivie = $request->heure_suivie;
      $hour->conseil_pfe = $request->conseil_pfe;
      $hour->type = $request->type;
      $hour->week_id = $request->week_id;
      $hour->professor_id = $request->professor_id;
  
  
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
      $hour->heure_suivie = $request->heure_suivie;
      $hour->conseil_pfe = $request->conseil_pfe;
      $hour->type = $request->type;
      $hour->week_id = $request->week_id;
      $hour->professor_id = $request->professor_id;

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
