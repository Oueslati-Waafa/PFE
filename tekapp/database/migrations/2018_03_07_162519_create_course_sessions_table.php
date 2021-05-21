<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger("course_plan_id");
            $table->unsignedInteger("time_table_fragment_id");
            //constraints
            $table->foreign("course_plan_id")->references("id")->on("course_plans")->onDelete("cascade");
            $table->foreign("time_table_fragment_id")->references("id")->on("time_table_fragments")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_sessions');
    }
}
