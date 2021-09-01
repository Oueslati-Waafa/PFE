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
    return Course::all();
  }


 // it works
  public function getCourseByProfessor($id)
  {
    return professor::with('courses')->where('id', $id)->get();
  }

}