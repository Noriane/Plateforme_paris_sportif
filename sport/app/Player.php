<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	protected $dates = [
		'birthdate',
		'created_at',
		'updated_at'
	];

	public function team()
	{
	    return $this->belongsTo('App\Team');
	}

	public function stats()
	{
	    return $this->hasOne('App\Stats_player', 'id_player');
	}
}
