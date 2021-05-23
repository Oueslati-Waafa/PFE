<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProfessorsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('professors', function (Blueprint $table) {
      $table->string('grade')->nullable();
      $table->string('cin_delivered_at')->nullable();
      $table->string('cnrps', 50)->nullable();
      $table->string('cnss', 50)->nullable();
      $table->string('phone', 50)->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('professors', function (Blueprint $table) {
      $table->dropColumn('grade');
      $table->dropColumn('cin_delivered_at');
      $table->dropColumn('cnrps');
      $table->dropColumn('cnss');
      $table->dropColumn('phone');
    });
  }
}
