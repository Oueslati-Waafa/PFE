<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeks_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('weeks_id');
            $table->float("h_suivie");
            $table->string("type");
            $table->timestamps();

              //constraints
            $table->foreign('weeks_id')->references('id')->on('weeks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weeks_hours');
    }
}
