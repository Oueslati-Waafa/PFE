<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getSession(Request $request)
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

  public function getAllSessions()
  {
    $sessions = Session::all();
    return response()->json([
      'sessions' => $sessions
    ]);
  }
}
