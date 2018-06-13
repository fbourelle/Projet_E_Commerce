<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('size_id')->unsigned()->index();
            $table->integer('color_id')->unsigned()->index();
            $table->integer('stock')->unsigned()->nullable();
            $table->integer('real_stock')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('product', function(Blueprint $table){
          $table->integer('user_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variant');
    }
}
