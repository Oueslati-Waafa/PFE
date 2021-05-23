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
    
}
