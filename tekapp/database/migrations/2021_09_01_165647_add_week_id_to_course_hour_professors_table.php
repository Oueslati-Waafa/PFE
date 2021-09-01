<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWeekIdToCourseHourProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_hour_professors', function (Blueprint $table) {
            $table->unsignedInteger("week_id");
            //constraints
            $table->foreign("week_id")->references("id")->on("weeks")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_hour_professors', function (Blueprint $table) {
            //
        });
    }
}
