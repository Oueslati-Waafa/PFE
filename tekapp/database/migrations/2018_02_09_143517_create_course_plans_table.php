<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger("branch_level_plan_id");
            $table->unsignedInteger("course_id");
            $table->double("hourly_amount");
            $table->double("etcs");
            $table->double("coefficient");
            //constraints
            $table->foreign("branch_level_plan_id")->references("id")->on("branch_level_plans")->onDelete("cascade");
            $table->foreign("course_id")->references("id")->on("courses")->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_plans');
    }
}
