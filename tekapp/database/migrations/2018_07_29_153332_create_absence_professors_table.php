<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsenceProfessorsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('absence_professors', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
      //
      $table->unsignedInteger('professor_id');
      $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
      //
      $table->unsignedInteger('course_session_id');
      $table->foreign('course_session_id')->references('id')->on('course_sessions')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('absence_professors');
  }
}
