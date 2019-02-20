<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Configurations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the configurations or settings table
         Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique(); //New addition
            $table->string('value'); //New addition
            $table->rememberToken(); //New addition

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
        Schema::dropIfExists('configurations');
    }
}
