<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorCourse extends Model
{
  //
  public function professor()
  {
    return $this->belongsTo("App\Professor")->with(["user"]);
  }

  public function classe()
  {
    return $this->belongsTo("App\Classe", "class_id")->with(["branchLevel", "sessions"]);
  }


  public function _classe()
  {
    return $this->belongsTo("App\Classe", "class_id");
  }



  /*
   * My methods
   * */
  function getRelationsAdds()
  {
    $this->professor;
    $this->course_plan;
    $this->classe;
    $this->content_course;
    $this->sessions = $this->sessions();
  }

  public static function validate($id)
  {
    $professorCourse = ProfessorCourse::find($id);
    if (!$professorCourse)
      return response()->json(["error" => "Professor Course is not found"], 404);
  }
}
