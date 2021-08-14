<?php

namespace App\Http\Controllers;

use App\prix_heures;
use Illuminate\Http\Request;

class PrixHeureController extends Controller
{
    //get all prix
    public function getAll()
    {
       $prix= prix_heures::all(); 
       return $prix;
    }

     //delete prix
     public function deletePrix($id)
     {
         $prix = prix_heures::find($id);
         if($prix->delete())
         {
             return response()->json(['status'=> true, 'message'=>'prix a été supprimer avec succés']);
         }
         else
         {
             return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
         }
 
     }


     //add prix
     public function savePrix(Request $request)
     {
         $prix = new prix_heures();
         $prix->jour = $request->jour;
         $prix->soir  = $request->soir ;
         $prix->suivie = $request->suivie;
         $prix->conseil_pfe = $request->conseil_pfe;
         
 
         if ($prix -> save())
         {
             return response()->json(['status'=> true,'message'=> 'Prix Added Succesfully']);
             
         }
         else
         {
             return response()->json(['status => false', 'message'=> 'There is some problem']);
         }
     }


     public function updatePrix(Request $request,$id)
     {
         $prix = prix_heures::where('id',$id)->first();
         $prix->jour = $request->jour;
         $prix->soir  = $request->soir ;
         $prix->suivie = $request->suivie;
         $prix->conseil_pfe = $request->conseil_pfe;

 
         if ($prix -> save())
         {
             return response()->json(['status'=> true,'message'=> 'updated  Succesfully']);
             
         }
         else
         {
             return response()->json(['status => false', 'message'=> 'There is some problem']);
         }
     }
 
     //get Prix
     public function getPrix($id)
     {
         $prix = prix_heures::find($id);
         return response()->json($prix);
     }
}
