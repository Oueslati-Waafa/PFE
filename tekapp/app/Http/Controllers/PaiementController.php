<?php

namespace App\Http\Controllers;

use App\paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    //getAll payments
    public function getAll()
    {
       $paiements= paiement::all(); 
       return $paiements;
    }

    //add pauements
    public function savePaiement(Request $request)
    {
        $paiement = new paiement;
        $paiement->sommeBrut = $request->sommeBrut;
        $paiement->retenue = $request->retenue;
        $paiement->avance = $request->avance;
        $paiement->net_a_payer = $request->net_a_payer;
        $paiement->contract_id = $request->contract_id;
        $paiement->professor_id = $request->professor_id;
        $paiement->datepaiement = $request->datepaiement;

        if ($paiement -> save())
        {
            return response()->json(['status'=> true,'message'=> 'Payement Added Suddesfully']);
            
        }
        else
        {
            return response()->json(['status => false', 'message'=> 'There is some problem']);
        }
    }
    

    public function updatePaiement(Request $request,$id)
    {
        $paiement = paiement::where('id',$id)->first();

        $paiement->sommeBrut = $request->sommeBrut;
        $paiement->retenue = $request->retenue;
        $paiement->avance = $request->avance;
        $paiement->net_a_payer = $request->net_a_payer;
        $paiement->contract_id = $request->contract_id;
        $paiement->professor_id = $request->professor_id;
        $paiement->datepaiement = $request->datepaiement;

        if ($paiement -> save())
        {
            return response()->json(['status'=> true,'message'=> 'updaate Added Suddesfully']);
            
        }
        else
        {
            return response()->json(['status => false', 'message'=> 'There is some problem']);
        }
    }

    public function deletePaiement($id)
    {
        $paiement = paiement::find($id);
        if($paiement->delete())
        {
            return response()->json(['status'=> true, 'message'=>'Paiement a été supprimer avec succés']);
        }
        else
        {
            return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
        }

    }

    public function getPaiement($id)
    {
        $paiement = paiement::find($id);
        return response()->json($paiement);
    }
}
