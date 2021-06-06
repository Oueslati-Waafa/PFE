<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameHSupplemetaires extends Migration
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
            $table->renameColumn('h_pfe','h_conseil');
            
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
            $table->renameColumn('h_pfe','h_conseil');
            
        });
    }
}
