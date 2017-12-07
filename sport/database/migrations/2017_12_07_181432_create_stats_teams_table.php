<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_team');
            $table->integer('nb_win');
            $table->integer('nb_loose');
            $table->integer('nb_played_match');
            $table->integer('nb_team_played');
            $table->integer('nb_points');
            $table->integer('nb_rebounds');
            $table->integer('nb_faults');
            $table->integer('nb_assists');
            $table->integer('nb_played_time');
            $table->float('weight');
            $table->float('age_average');

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
        Schema::dropIfExists('stats_team');
    }
}
