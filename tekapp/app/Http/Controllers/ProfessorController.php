<?php

namespace App\Http\Controllers;

use App\professors;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
     /*   //get all professors
        public function getAll()
        {
           $professors= professors::all(); 
           return $professors;
        }

        
     //get professor by ID 
     public function getPrix($id)
     {
         $professors = professors::find($id);
         return response()->json($professors);
     }*/

     public function get($id)
     {
       $professor = professors::find($id);
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
   
     public function getProfessor(Request $request)
     {
       $this->validate($request, [
         "user_id" => "required|exists:professors,user_id"
       ]);
   
       $professor = professors::where("user_id", $request->user_id)
         ->with('user')
         ->first();
       return response()->json([
         "professor" => $professor
       ], 200);
     }
   
     public function all()
     {
       return professors::with("user")->get();
     }
}
