<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger("branch_id");
            $table->unsignedInteger("level");
            $table->unsignedInteger("session_id");
            //constraints
            $table->foreign("branch_id")->references("id")->on("branches")->onDelete("cascade");
            $table->foreign("session_id")->references("id")->on("sessions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_levels');
    }
}
