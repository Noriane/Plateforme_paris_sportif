<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_match', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_matches');
            $table->integer('nb_points');
            $table->integer('nb_rebounds');
            $table->integer('nb_assists');
            $table->integer('nb_faults');
            $table->integer('nb_supporter');
            $table->integer('match_duration')->default(2880);
            $table->string('playground');
            $table->string('country');

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
        Schema::dropIfExists('stats_match');
    }
}
