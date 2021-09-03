<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeyFromCourseHourProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_hour_professors', function (Blueprint $table) {
            $table->dropForeign('course_hour_professor_hour_id_foreign');
            $table->dropColumn('hour_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_hour_professors', function (Blueprint $table) {
            //
        });
    }
}
