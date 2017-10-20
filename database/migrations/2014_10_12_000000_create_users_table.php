<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('socialite_id')->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 225);
            $table->string('name', 100);
            $table->string('address', 225)->nullable();
            $table->string('phone', 50)->nullable();
            $table->tinyInteger('role');
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
