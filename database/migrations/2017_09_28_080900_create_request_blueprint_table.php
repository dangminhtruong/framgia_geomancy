<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestBlueprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_blueprints', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->tinyInteger('status')->default(0);
            $table->integer('improve_blueprint_id')->unsigned();
            $table->foreign('improve_blueprint_id')->references('id')->on('improve_blueprint');
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
        Schema::dropIfExists('request_blueprints');
    }
}
