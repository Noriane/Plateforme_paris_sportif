<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Player;
use App\Team;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();
		$faker->addProvider(new \Bezhanov\Faker\Provider\Avatar($faker));
		$faker->addProvider(new \Bezhanov\Faker\Provider\Team($faker));
    	
    	for ($i = 0; $i<5; $i++)
    	{
    		

    		//Generate Players
	        DB::table('players')->insert([
	            'player_name' => $faker->name,
	            'birthdate' => Carbon::create('1985', '12', '01'),
	            'height' => rand(160, 250)/100,
	            'weight' => $faker->numberBetween(55,100),
	            'team_id' => $faker->numberBetween(1,5),
	            'player_picture' => $faker->avatar,
	        ]);
			
			//Generate Teams
	        DB::table('teams')->insert([
	            'team_name' => $faker->team,
	            'nb_players' => $faker->numberBetween(1,20),
	            'nb_matches' => $faker->numberBetween(1,10),
	            'coach_name' => $faker->name,
	            'country_id' => $faker->numberBetween(1,250),
	            //'email' => str_random(10).'@gmail.com',
	            //'password' => bcrypt('secret'),
	        ]);
			

	        //Generate Match
	        DB::table('matchs')->insert([
	            'team_1' => rand(1, 5),
	            'team_2' => rand(1, 5),
	            'score_team_1' => rand(0, 102),
	            'score_team_2' => rand(0, 102),
	            'match_date' => Carbon::create('2017', '12', '01'),
	            'playground' => 1,
	        ]);

	        
	        //Generate Playground
	        DB::table('playgrounds')->insert([
	            'playground_name' => $faker->name,
	            'country' => $faker->numberBetween(1,10),
	            'playground_picture' => $faker->avatar,
	            'nb_supporter_max' => rand(40000, 80000),
	        ]);
	        

    	}

    	$players = Player::all();
		DB::table('stats_players')->truncate();
    	foreach ($players as $player)
    	{
	        DB::table('stats_players')->insert([
	            'id_player' => $player->id,
	            'id_match' => $faker->numberBetween(1,10),
	            'nb_match' => $faker->numberBetween(0,10),
	            'nb_points' => $faker->numberBetween(0,102),
	            'nb_faults' => $faker->numberBetween(0,6),
	            'nb_rebounds' => $faker->numberBetween(0,25),
	            'nb_assists' => $faker->numberBetween(0,30),
	            'game_time' => $faker->numberBetween(0,2880),
	            'no_game_time' => $faker->numberBetween(0,2880),
	        ]);
    	}

    	$teams = Team::all();
		DB::table('stats_teams')->truncate();
    	foreach ($teams as $team)
    	{
	        DB::table('stats_teams')->insert([
	            'id_team' => $team->id,
	            'nb_win' => $faker->numberBetween(1,10),
	            'nb_loose' => $faker->numberBetween(0,10),
	            'nb_played_match' => $faker->numberBetween(0,20),
	            'nb_team_played' => $faker->numberBetween(0,5),
	            'nb_points' => $faker->numberBetween(0,500),
	            'nb_rebounds' => $faker->numberBetween(0,200),
	            'nb_faults' => $faker->numberBetween(0,20),
	            'nb_assists' => $faker->numberBetween(0,300),
	            'nb_played_time' => $faker->numberBetween(0,1000),
	            'weight' => $faker->numberBetween(500,2000),
	            'age_average' => $faker->numberBetween(20,40),
	        ]);
    	}
    }
}
