<?php

namespace App\Http\Controllers;

use App\AbsenceProfessor;
use Illuminate\Http\Request;

class AbsenceProfessorController extends Controller
{
  public function add(Request $request)
  {
    $this->validate($request, [
      'course_session_id' => 'required|exists:course_sessions,id',
      'professor_id' => 'required|exists:professors,id',
    ]);

    $absenceProfessor = AbsenceProfessor::where('course_session_id', $request->course_session_id)
      ->where('professor_id', $request->professor_id)->first();

    if (!$absenceProfessor) {
      $absenceProfessor = new AbsenceProfessor();
      $absenceProfessor->course_session_id = $request->course_session_id;
      $absenceProfessor->professor_id = $request->professor_id;
      $absenceProfessor->save();
      $absenceProfessor = AbsenceProfessor::find($absenceProfessor->id); //get it from source
    }


    return response()->json([
      'absence_professor' => $absenceProfessor
    ]);
  }


  function delete(Request $request)
  {
    $this->validate($request, [
      'course_session_id' => 'required|exists:course_sessions,id',
      'professor_id' => 'required|exists:professors,id',
    ]);

    $absenceProfessor = AbsenceProfessor::where('course_session_id', $request->course_session_id)
      ->where('professor_id', $request->professor_id)->first();

    if ($absenceProfessor) {
      $absenceProfessor->delete();
    }
    return response()->json([
      'success' => 'Operation succeeded'
    ]);

  }
}
