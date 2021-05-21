<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('paiements', function (Blueprint $table) {
        $table->increments('id');
        $table->float("sommeBrut");
        $table->float("retenue");
        $table->float("avance");
        $table->float("net_a_payer");
        $table->timestamps();
        $table->unsignedInteger('contract_id');
        $table->unsignedInteger('professor_id');
        $table->date('datepaiement');

        $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
        $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
        
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}
