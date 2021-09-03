<?php

namespace App\Http\Controllers;

use App\Course;
use App\professor;


class ProfessorController extends Controller
{

  public function get($id)
  {
    $professor = professor::find($id);
    if (!$professor) {
      return response()->json([
        "error" => "No Professor found"
      ], 404);
    } else {
      $professor->user;
      return response()->json([
        "professor" => $professor
      ], 200);
    }
  }

  public function getProfessor($id)
  {
    $professors = professor::with("user")->where('id', $id)->get();
    return response()->json([
      'professors' => $professors
    ]);
  }

  public function all()
  {
    return professor::with("user")->get();
  }
 // it works
 public function getProfessorByCourse($id)
 {
   return Course::with('professor')->where('id', $id)->get();
 }
  
}
