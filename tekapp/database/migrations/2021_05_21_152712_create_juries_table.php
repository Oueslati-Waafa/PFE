<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('jury_professor_id');
            $table->string('position');
            //constraints
            $table
                ->foreign('jury_professor_id')
                ->references('id')
                ->on('professors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juries');
    }
}
