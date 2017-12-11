<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
	protected $dates = [
		'end_time',
		'created_at',
		'updated_at'
	];

	public function match()
	{
	    return $this->belongsTo('App\Match', 'match_id');
	}

	public function team1()
	{
	    return $this->hasOne('App\Team','id', 'team_1');
	} 
	public function team2()
	{
	    return $this->hasOne('App\Team','id', 'team_2');
	}

	public function teams()
	{
		return $this->with("team1")->get()->combine($this->with("team2")->get());
	}
}
