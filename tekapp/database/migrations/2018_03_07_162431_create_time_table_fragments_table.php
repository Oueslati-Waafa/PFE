<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTableFragmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_table_fragments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger("time_table_id");
            $table->time("time_start");
            $table->time("time_end");
            $table->date("date");
            //constraints
            $table->foreign("time_table_id")->references("id")->on("time_tables")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_table_fragments');
    }
}
