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
        
        $obj = CourseHourProfessor::orderBy('nbr_hour_course', 'desc')->with(['course','professor.user','hour','week'])->get();
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
         $bilan = new bilan_module;
         $bilan->dateBM = $request->dateBM;
         $bilan->professor_id  = $request->professor_id ;
         $bilan->course_id = $request->course_id;
         
 
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
         $bilan = bilan_module::where('id',$id)->first();
         $bilan->dateBM  = $request->dateBM ;
         $bilan->course_id = $request->course_id;
         $bilan->professor_id = $request->professor_id;

 
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
        return CourseHourProfessor::with(['course','professor.user','hour','week'])->where('id', $id)->get();
     }
}
