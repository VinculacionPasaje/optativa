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
          $table->string('name');
          $table->string('last_name');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('path')->nullable(); //nullable significa que permite valores nulos
          $table->char('state',1)->default(1);
           $table->integer('rol_id')->unsigned();
            $table->rememberToken();
            $table->foreign('rol_id')->references('id')->on('roles');

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
