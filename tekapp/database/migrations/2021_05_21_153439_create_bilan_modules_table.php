<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilanModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilan_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateBM')->nullable();
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('professor_id');
            $table->timestamps();

            //constraints
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bilan_modules');
    }
}
