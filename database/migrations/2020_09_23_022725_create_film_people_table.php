<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('film_people');
        Schema::create('film_people', function (Blueprint $table) {   
            $table->increments('id');
            $table->integer('film_id')->unsigned();
            $table->integer('people_id')->unsigned();
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('people_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_people');
    }
}
