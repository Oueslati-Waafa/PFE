<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseHourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_hour', function (Blueprint $table) {
            $table->unsignedInteger('hour_id');
            $table->unsignedInteger('course_id');
            $table->foreign('hour_id')
                  ->references('id')
                  ->on('hours')->onDelete('cascade');

            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_hour');
    }
}
