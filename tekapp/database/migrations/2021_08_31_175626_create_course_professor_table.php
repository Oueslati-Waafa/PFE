<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_professor', function (Blueprint $table) {
            $table->unsignedInteger('professor_id');
            $table->unsignedInteger('course_id');
            $table->foreign('professor_id')
                  ->references('id')
                  ->on('professors')->onDelete('cascade');

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
        Schema::dropIfExists('course_professor');
    }
}
