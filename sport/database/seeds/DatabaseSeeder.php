<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Player;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 0; $i<5; $i++)
    	{
    		$faker = Faker::create();
			$faker->addProvider(new \Bezhanov\Faker\Provider\Avatar($faker));
			$faker->addProvider(new \Bezhanov\Faker\Provider\Team($faker));

	        DB::table('players')->insert([
	            'player_name' => $faker->name,
	            'birthdate' => Carbon::create('1985', '12', '01'),
	            'height' => rand(160, 250)/100,
	            'weight' => $faker->numberBetween(55,100),
	            'team_id' => $faker->numberBetween(1,5),
	            'player_picture' => $faker->avatar,
	        ]);


	        DB::table('teams')->insert([
	            'team_name' => $faker->team,
	            'nb_players' => $faker->numberBetween(1,20),
	            'nb_matches' => $faker->numberBetween(1,10),
	            'coach_name' => $faker->name,
	            'country_id' => $faker->numberBetween(1,250),
	            //'email' => str_random(10).'@gmail.com',
	            //'password' => bcrypt('secret'),
	        ]);


	        DB::table('matchs')->insert([
	            'team_1' => 1,
	            'team_2' => 2,
	            'winner' => 1,
	            'looser' => 2,
	            'score_win' => rand(50, 102),
	            'score_loose' => rand(0, 49),
	            'match_date' => Carbon::create('2017', '12', '01'),
	            'playground' => 1,
	        ]);

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
    }
}
