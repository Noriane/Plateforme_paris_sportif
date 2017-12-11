<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	protected $table = "matchs";
	protected $dates = [
		'match_date',
		'created_at',
		'updated_at'
	];

    public function team1()
	{
	    return $this->hasOne('App\Team', 'id','team_1');
	} 
	public function team2()
	{
	    return $this->hasOne('App\Team', 'id','team_2');
	}

	public function playground1()
	{
	    return $this->hasOne('App\Playground', 'id','playground');
	}

	public function teams()
	{
		return $this->with("team1")->get()->combine($this->with("team2")->get());
	}

	public function stats_match()
	{
		return $this->hasOne('App\Stats_match', 'id');
	}
	public function playground_used()
	{
	    return $this->hasOne('App\Playground', 'id');

	}
}
 