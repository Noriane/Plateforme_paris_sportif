<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	public function team()
	{
	    return $this->belongsTo('App\Team');
	}

	//Match played
	public function stats()
	{
	    return $this->hasOne('App\Stats_player', 'id_player');
	}
}
