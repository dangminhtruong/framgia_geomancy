<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImproveBlueprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('improve_blueprints', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('publish_flg')->default(0);
            $table->integer('blueprints_id')->unsigned();
            $table->foreign('blueprints_id')->references('id')->on('blueprints');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('improve_blueprints');
    }
}
