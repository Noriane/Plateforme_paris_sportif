<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatchScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matchs', function (Blueprint $table) {
            $table->dropColumn('winner');
            $table->dropColumn('looser');
            $table->dropColumn('score_win');
            $table->dropColumn('score_loose');
            $table->integer('score_team_1')->default(0);
            $table->integer('score_team_2')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('score_team_1');
        $table->dropColumn('score_team_2');
        $table->integer('winner');
        $table->integer('looser');
        $table->integer('score_win');
        $table->integer('score_loose');
    }
}

