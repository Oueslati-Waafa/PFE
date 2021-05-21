<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchLevelPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_level_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger("branch_level_id");
            $table->unsignedInteger("module_id");
            $table->unsignedInteger("period_id");
            //constraints
            $table->foreign("branch_level_id")->references("id")->on("branch_levels")->onDelete("cascade");
            $table->foreign("module_id")->references("id")->on("modules")->onDelete("cascade");
            $table->foreign("period_id")->references("id")->on("periods")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_level_plans');
    }
}
