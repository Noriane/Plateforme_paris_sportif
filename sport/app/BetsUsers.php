<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BetsUsers extends Model
{
	protected $dates = [
		'created_at',
		'updated_at'
	];

	public function match()
	{
	    return $this->belongsTo('App\Match', 'match_id');
	}

	public function team()
	{
	    return $this->hasOne('App\Team','team_bet_id');
	} 

	public function user()
	{
	    return $this->hasOne('App\user','user_id');
	}
}
