<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHSupplemetaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('h_supplemetaires', function (Blueprint $table) {
            //adding new columns
            $table->integer('h_enseign_jour')->nullable();
            $table->integer('h_enseign_soir')->nullable();
            $table->integer('h_surveillance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('h_supplemetaires', function (Blueprint $table) {
            //
            $table->dropColumn('h_enseign_jour');
            $table->dropColumn('h_enseign_soir');
            $table->dropColumn('h_surveillance');
        });
    }
}
