<?php

namespace App\Http\Controllers;

use App\contract;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    //get all conracts
    public function getAll()
    {
       $contract= contract::all(); 
       return $contract;
    }

    //delete contracts
    public function deleteContract($id)
    {
        $contract = contract::find($id);
        if($contract->delete())
        {
            return response()->json(['status'=> true, 'message'=>'contract a été supprimer avec succés']);
        }
        else
        {
            return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
        }

    }

     //add pauements
     public function saveContract(Request $request)
     {
         $contract = new contract;
         $contract->professor_id  = $request->professor_id ;
         $contract->date_debut = $request->date_debut;
         $contract->date_fin = $request->date_fin;
         $contract->type = $request->type;
         $contract->MF = $request->MF;
         $contract->RC = $request->RC;
 
         if ($contract -> save())
         {
             return response()->json(['status'=> true,'message'=> 'Contract Added Suddesfully']);
             
         }
         else
         {
             return response()->json(['status => false', 'message'=> 'There is some problem']);
         }
     }
    
}
