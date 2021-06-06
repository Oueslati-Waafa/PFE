<?php

namespace App\Http\Controllers;

use App\h_supplemetaires;

use Illuminate\Http\Request;

class HeureSuppController extends Controller
{
        //getAll supp houres
        public function getAll()
        {
           $heures_supp= h_supplemetaires::all(); 
           return $heures_supp;
        }

        public function saveHeures(Request $request)
    {
        $heures_supp = new h_supplemetaires;
        $heures_supp->h_jury = $request->h_jury;
        $heures_supp->h_encadrement = $request->h_encadrement;
        $heures_supp->h_conseil = $request->h_conseil;
        $heures_supp->semester = $request->semester;
        $heures_supp->professor_id = $request->professor_id;
        $heures_supp->h_surveillance = $request->h_surveillance;
        

        if ($heures_supp -> save())
        {
            return response()->json(['status'=> true,'message'=> 'Heures Supplimentaires sont affectés avec succes']);
            
        }
        else
        {
            return response()->json(['status => false', 'message'=> 'Erreur']);
        }
    }

    public function updateHeures(Request $request,$id)
    {
        $heures_supp = h_supplemetaires::where('id',$id)->first();

        $heures_supp->h_jury = $request->h_jury;
        $heures_supp->h_encadrement = $request->h_encadrement;
        $heures_supp->h_conseil = $request->h_conseil;
        $heures_supp->semester = $request->semester;
        $heures_supp->professor_id = $request->professor_id;
        $heures_supp->h_surveillance = $request->h_surveillance;

        if ($heures_supp -> save())
        {
            return response()->json(['status'=> true,'message'=> 'updaate Added Suddesfully']);
            
        }
        else
        {
            return response()->json(['status => false', 'message'=> 'There is some problem']);
        }
    }

    public function getHeures($id)
    {
        $heures_supp = h_supplemetaires::find($id);
        return response()->json($heures_supp);
    }

    public function deleteHeures($id)
    {
        $heures_supp = h_supplemetaires::find($id);
        if($heures_supp->delete())
        {
            return response()->json(['status'=> true, 'message'=>'heures_supp a été supprimer avec succés']);
        }
        else
        {
            return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
        }

    }
}
