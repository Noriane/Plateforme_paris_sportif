<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use Carbon\Carbon;

class MatchController extends Controller
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
		$matches = Match::with("team1","team2")->orderBy("match_date","DESC")->get();
		$now = Carbon::now();
        return view('match', ['matches'=>$matches, 'date_now'=>$now]);
    }

    public function displayStats($id)
    {
    	$match = Match::with("team1","team2")->with("stats_match")->with("playground_used.country_playground")->find($id);
    	$page = "match";
    	//dd($match);
        return view('match_stats', ['match'=>$match, 'page'=>$page]);
    }
}
