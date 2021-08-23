<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SessionController extends Controller
{

  //get qll sessions
  public function getAll()
  {
     $session= Session::paginate(5); 
     return $session;
  }

  public function getSessionWithPeriods(Request $request)
  {

    $session = null;
    if ($request->id) {
      $session = Session::where('id', $request->id)->first();
    }

    if (!$session) {
      $session = Session::orderBy("start_date", "desc")->first();
    }

    if ($session) {
      $session->periods = $session->_periods;
      unset($session->_periods);
      $session->times;
      return response()->json([
        'session' => $session
      ]);
    } else {
      return response()->json([
        'error' => 'No session defined'
      ], Response::HTTP_BAD_REQUEST);
    }

  }

  function allWithPeriods()
  {
    $sessions =
      Session::orderBy('end_date', 'desc')
        ->with([
          '_periods',
        ])
        ->get();
    
    return response()->json([
      'sessions' => $sessions
    ]);
  }

  //  get session by ID
   
     public function getSession($id)
     {
         $session = Session::find($id);
         return response()->json($session);
     }

  //add session
  public function saveSession(Request $request)
  {
      $session = new Session();
      $session->name = $request->name;
      $session->type  = $request->type ;
      $session->start_date = $request->start_date;
      $session->end_date = $request->end_date;
      

      if ($session -> save())
      {
          return response()->json(['status'=> true,'message'=> 'Session Added Succesfully']);
          
      }
      else
      {
          return response()->json(['status => false', 'message'=> 'There is some problem']);
      }
  }

  //delete session
       
       public function deleteSession($id)
       {
           $session = Session::find($id);
           if($session->delete())
           {
               return response()->json(['status'=> true, 'message'=>'session a été supprimer avec succés']);
           }
           else
           {
               return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
           }
   
       }

//update session

     public function updateSession(Request $request,$id)
     {
         $session = Session::where('id',$id)->first();
         $session->name = $request->name;
         $session->type  = $request->type ;
         $session->start_date = $request->start_date;
         $session->end_date = $request->end_date;

 
         if ($session -> save())
         {
             return response()->json(['status'=> true,'message'=> 'updated  Succesfully']);
             
         }
         else
         {
             return response()->json(['status => false', 'message'=> 'There is some problem']);
         }
     }

}
