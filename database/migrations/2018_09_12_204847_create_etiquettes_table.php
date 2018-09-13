<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('etiquettes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

          Schema::create('product_etiquettes', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('product_id')->unsigned()->index();
              $table->integer('etiquette_id')->unsigned()->index();
              $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
              $table->foreign('etiquette_id')->references('id')->on('etiquettes')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiquettes');
    }
}
