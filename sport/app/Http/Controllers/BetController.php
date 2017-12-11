<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bet;
use App\BetsUsers;
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

        $bets = BetsUsers::where('user_id', $userId)->get();

        $now = Carbon::now();
        return view('myBets', ['bets'=>$bets, 'date_now'=>$now]);
    }
}
