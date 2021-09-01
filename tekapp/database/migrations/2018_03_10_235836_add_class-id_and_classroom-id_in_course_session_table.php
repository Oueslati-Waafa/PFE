<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassIdAndClassroomIdInCourseSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("course_sessions", function(Blueprint $table) {
           $table->unsignedInteger("classroom_id")->nullable();
           $table->unsignedInteger("class_id")->nullable();
           //constraints
            $table->foreign("classroom_id")->references("id")->on("classrooms")->onDelete("set null");
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
