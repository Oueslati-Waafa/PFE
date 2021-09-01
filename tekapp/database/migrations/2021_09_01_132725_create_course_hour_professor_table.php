<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseHourProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_hour_professors', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('professor_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('hour_id');
            $table->unsignedInteger('nbr_hour_course');
            $table->foreign('professor_id')
                  ->references('id')
                  ->on('professors')->onDelete('cascade');

            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')->onDelete('cascade');
            $table->foreign('hour_id')
                  ->references('id')
                  ->on('hours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_hour_professor');
    }
}
