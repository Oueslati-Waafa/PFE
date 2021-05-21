<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHSupplemetairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_supplemetaires', function (Blueprint $table) {
            $table->increments('id');
            $table->float("h_suppl");
            $table->float("h_jury");
            $table->float("h_encadrement");
            $table->float("h_pfe");
            $table->integer("semester");
            $table->timestamps();

            $table->unsignedInteger('professor_id');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_supplemetaires');
    }
}
