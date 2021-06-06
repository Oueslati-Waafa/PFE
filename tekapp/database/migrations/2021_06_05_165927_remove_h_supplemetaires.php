<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveHSupplemetaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('h_supplemetaires', function (Blueprint $table) {
            //
            $table->dropColumn('h_enseign_jour');
            $table->dropColumn('h_enseign_soir');
            $table->dropColumn('h_suppl');
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
            $table->integer('h_enseign_jour');
            $table->integer('h_enseign_soir');
            $table->integer('h_suppl');
        });
    }
}
