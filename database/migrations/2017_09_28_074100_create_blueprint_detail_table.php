<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlueprintDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blueprint_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('blueprints_id')->unsigned();
            $table->foreign('blueprints_id')->references('id')->on('blueprints');
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');
            $table->softDeletes();
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
        Schema::dropIfExists('blueprint_detail');
    }
}
