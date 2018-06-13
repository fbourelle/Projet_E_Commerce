<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampToColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('colors', function (Blueprint $table) {
          $table->timestamps();
      });
      Schema::table('sizes', function (Blueprint $table) {
          $table->timestamps();
      });
      Schema::table('status', function (Blueprint $table) {
          $table->timestamps();  
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
