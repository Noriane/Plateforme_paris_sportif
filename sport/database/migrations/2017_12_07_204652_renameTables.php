<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename("player", "players");
        Schema::rename("match", "matchs");
        Schema::rename("team", "teams");
        Schema::rename("country", "countrys");
        Schema::rename("playground", "playgrounds");
        Schema::rename("stats_player", "stats_players");
        Schema::rename("stats_team", "stats_teams");
        Schema::rename("stats_match", "stats_matchs");
        Schema::rename("stats_playground", "stats_playgrounds");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename("players", "player");
        Schema::rename("matchs", "match");
        Schema::rename("teams", "team");
        Schema::rename("countrys", "country");
        Schema::rename("playgrounds", "playground");
        Schema::rename("stats_players", "stats_player");
        Schema::rename("stats_teams", "stats_team");
        Schema::rename("stats_matchs", "stats_match");
        Schema::rename("stats_playgrounds", "stats_playground");
        //
    }
}
