<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlueprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blueprints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->tinyInteger('publish_flg')->default(1);
            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topic');
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
        Schema::dropIfExists('blueprints');
    }
}
