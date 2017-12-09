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
    public function index()
    {
		$players = Player::with("team")->with("stats")->get();
		//$players = Player::with("team")->get();
		/*
		echo "<pre>";
		var_dump($players);
		echo "</pre>";
		*/
        return view('players', ['players'=>$players]);
    }
}
