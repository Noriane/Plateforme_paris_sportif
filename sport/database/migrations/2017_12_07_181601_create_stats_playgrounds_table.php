<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsPlaygroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_playground', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_playground');
            $table->integer('nb_matches')->nullable();
            $table->integer('nb_team')->nullable();
            $table->integer('nb_points')->nullable();
            $table->integer('nb_assists')->nullable();
            $table->integer('nb_rebounds')->nullable();
            $table->integer('nb_faults')->nullable();

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
        Schema::dropIfExists('stats_playground');
    }
}
