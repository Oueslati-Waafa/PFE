<?php

namespace App\Http\Controllers;

use App\Period;
use App\Session;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function savePeriod()
    {
        $sessions=Session::all();
        return $sessions;
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
public function getPeriod()
{
    
}

public function deletePeriod()
{
    
}
}
