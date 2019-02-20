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
            $table->string('email')->unique(); //New addition
            $table->string('password')->nullable(false); //New addition
            $table->rememberToken(); //New addition

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. Roll back the users table, but it's rarely used.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
