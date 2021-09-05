<?php

namespace App\Http\Controllers;

use App\bilan_module;
use App\CourseHourProfessor;
use Illuminate\Http\Request;

class BilanModuleController extends Controller
{
       //get all bilan
       public function getAll()
       {
        
        $obj = CourseHourProfessor::orderBy('id', 'desc')->with(['course','professor.user','week'])->get();
         return response()->json([
            'course_hour_professors' => $obj
          ]);
        
       }
       //delete bilan
       public function deleteBilan($id)
       {
           $bilan = bilan_module::find($id);
           if($bilan->delete())
           {
               return response()->json(['status'=> true, 'message'=>'Bilan a été supprimer avec succées']);
           }
           else
           {
               return response()->json(['status'=> true, 'message'=>'erreur veillez repeter la procedure']); 
           }
   
       }
        //add contracts
     public function saveBilan(Request $request)
     {
         $bilan = new CourseHourProfessor();
         $bilan->professor_id = $request->professor_id;
         $bilan->course_id  = $request->course_id ;
         $bilan->week_id = $request->week_id;
         $bilan->nbr_hour_course = $request->nbr_hour_course;
         
 
         if ($bilan -> save())
         {
             return response()->json(['status'=> true,'message'=> 'bilan Added Succesfully']);
             
         }
         else
         {
             return response()->json(['status => false', 'message'=> 'There is some problem']);
         }
     }

     public function updateBilan(Request $request,$id)
     {
         $bilan = CourseHourProfessor::where('id',$id)->first();
         $bilan->professor_id = $request->professor_id;
         $bilan->course_id  = $request->course_id ;
         $bilan->week_id = $request->week_id;
         $bilan->nbr_hour_course = $request->nbr_hour_course;

 
         if ($bilan -> save())
         {
             return response()->json(['status'=> true,'message'=> 'updated  Succesfully']);
             
         }
         else
         {
             return response()->json(['status => false', 'message'=> 'There is some problem']);
         }
     }
 
     //get contract
     public function getBilan($id)
     {
         
     
          $bilan = CourseHourProfessor::with(['course','professor.user','week'])->find($id);
          return response()->json([
            'course_hour_professors' => $bilan
          ]);
          
     }

     public function getBilanByProfessor($id)
     {
        $obj= CourseHourProfessor::orderBy('week_id', 'asc')->with(['course','professor.user','week'])->where('professor_id', $id)->get();
        return response()->json([
            'course_hour_professors' => $obj
          ]);
     }
}
