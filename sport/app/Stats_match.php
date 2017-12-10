<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats_match extends Model
{
    protected $table = "stats_matchs";

    public function teams()
	{
	    return $this->hasMany('App\Match');
	}
}
