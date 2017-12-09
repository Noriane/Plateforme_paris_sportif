<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = NULL)
    {
		$players = Player::with("team.country")->with("stats")->get();
		if (isset($id))
		{
			$current_player = Player::with("team.country")->with("stats")->find($id);
		}else
		{
			$current_player = $players->first();
		}

        return view('players', ['players'=>$players, 'current_player'=>$current_player]);
    }
}
