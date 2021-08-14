<?php

namespace App\Http\Controllers;

use App\professors;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
        //get all professors
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
     }
}
