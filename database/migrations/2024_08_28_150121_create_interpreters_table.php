<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interpreters', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name', 55)->nullable();
            $table->string('email', 55)->nullable();
            $table->string('phone')->nullable(); 
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities'); 
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states'); 
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries'); 
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('subject')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('interpreters');
    }
};
