<?php

namespace App\Http\Controllers;


use App\Course;
use App\professor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
  //
  public function all()
  {
    $courses = Course::orderBy('name', 'asc')->get();
        return response()->json([
          'courses' => $courses
        ]);
  }


 // it works
  public function getCourseByProfessor($id)
  {
    return course::with('professor')->where('id', $id)->get();
  }

}