<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bet;
use App\BetsUsers;
use App\Match;
use App\Team;
use Carbon\Carbon;

class BetController extends Controller
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
		$bets = Bet::with("match")->with("team1","team2")->get();
		$now = Carbon::now();

        return view('bets', ['bets'=>$bets, 'date_now'=>$now]);
    }

    public function displayUserBets()
    {
        $userId = Auth::id();

        $betusers = BetsUsers::where('user_id', $userId)->with('bets')->get();
        foreach ($betusers as $betuser)
        {
            $betuser->bets = Bet::find($betuser->bet_id);
            $betuser->bets->match = Match::find($betuser->bets->match_id);
            $betuser->bets->match->team1 = Team::find($betuser->bets->match->team_1);
            $betuser->bets->match->team2 = Team::find($betuser->bets->match->team_2);
        }
        //dd($betusers);

        $now = Carbon::now();
        return view('myBets', ['bet_user'=>$betusers, 'date_now'=>$now]);
    }
}
