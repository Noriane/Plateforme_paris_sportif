<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playground extends Model
{
    public function country_playground()
	{
	    return $this->belongsTo('App\Country', 'country');
	}
}
