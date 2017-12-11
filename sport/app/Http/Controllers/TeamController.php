<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Carbon\Carbon;

class TeamController extends Controller
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
		$teams = Team::with("stats")->with("country")->get();
		if (isset($id))
		{
			$current_team = Team::with("stats")->with("country")->with("players")->find($id);
		}else
		{
			$current_team = $teams->first();
		}
        dd($teams);
       $now = Carbon::now();
        return view('teams', ['teams'=>$teams, 'current_team'=>$current_team, 'date_now'=>$now]);
    }
}
