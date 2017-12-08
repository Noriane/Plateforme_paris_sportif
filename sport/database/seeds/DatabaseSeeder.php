<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Faker\Factory as Faker;

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
	            'nationality' => $faker->country,
	            //'email' => str_random(10).'@gmail.com',
	            //'password' => bcrypt('secret'),
	        ]);
    	}
    }
}
