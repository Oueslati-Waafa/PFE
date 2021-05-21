<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger("professor_id");
            $table->unsignedInteger("course_plan_id");
            $table->unsignedInteger("class_id");
            $table->string("course_type");
            //constraints
            $table->foreign("professor_id")->references("id")->on("professors")->onDelete("cascade");
            $table->foreign("course_plan_id")->references("id")->on("course_plans")->onDelete("cascade");
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_courses');
    }
}
