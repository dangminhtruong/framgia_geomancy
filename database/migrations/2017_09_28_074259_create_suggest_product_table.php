<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggest_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->integer('price');
            $table->jsonb('attribute')->nullable();
            $table->text('description')->nullable();
            $table->integer('blueprints_id')->nullable()->unsigned();
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');
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
        Schema::dropIfExists('suggest_product');
    }
}
