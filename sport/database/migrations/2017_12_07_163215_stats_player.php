<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatsPlayer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_player', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_player');
            $table->integer('id_match');
            $table->integer('nb_match');
            $table->integer('nb_points');
            $table->integer('nb_faults');
            $table->integer('nb_rebounds');
            $table->integer('nb_assists');
            $table->integer('ban')->default(0);


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
        Schema::dropIfExists('country');
    }
}
