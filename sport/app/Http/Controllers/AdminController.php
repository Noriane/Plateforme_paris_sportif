<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Match;
use App\Team;
use App\Player;
use App\Playground;
use App\Stats_match;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

        public function language(String $locale)
    {
        $locale = in_array($locale, config('app.locales')) ? $locale : config('app.fallback_locale');
        session(['locale' => $locale]);
        return back();
    }


//MATCHS
    public function matchs()
    {
       $matches = Match::with("team1","team2","playground1")->get();
        return view('admin.matchs', ['matches'=>$matches]);
    }
    


    public function CreateMatch()
    {
        //$data['team_list'] = DB::table('teams')->get();
        $teams = Team::pluck("team_name", "id");
        $playgrounds = Playground::pluck("playground_name", "id");
        return view('admin.CreateMatch', compact('teams'), compact('playgrounds'));
    }

   public function StoreMatch(Request $request)
 {      
 
        $id = DB::table('matchs')->insertGetId(
        ['team_1' => $request->input('team_1'),
        'score_team_1' => "0",
        'team_2' => $request->input('team_2'),
        'score_team_2' => "0",
        'match_date' => $request->input('match_date'),
        'playground' => $request->input('playground'),
        'created_at' => NOW(),
        'updated_at' => NOW()]
);

        $newid = DB::table('matchs')->where('match_date', $request->input('match_date'))->first();

         $bet = DB::table('bets')->insertGetId(
           ['match_id' => $newid->id,
           'cote_team_1' => $request->input('cote_team_1'),
           'cote_team_2' => $request->input('cote_team_2'),
           'end_time' => $request->input('match_date'),
           ]);

        echo "The match has been created!";
  }


  public function delete_match($id)
 {
      $match = Match::find($id);
      $match->delete();
  }

  public function update_stats($id)
  {
    $match = Match::find($id);
    return view('admin.add_stats', ['match_id' => $id]);
  }

  public function add_stats(Request $request, $id)
  {

    $nb = $request->input('nb_points_team1')+ $request->input('nb_points_team2');
    $stats = \App\Stats_match::where('id_matches', $id)->first();
    $stats->nb_points = $nb;
    $stats->nb_rebounds = $request->input('nb_rebounds');
    $stats->nb_assists = $request->input('nb_assists');
    $stats->nb_faults = $request->input('nb_faults');
    $stats->nb_supporter = $request->input('nb_supporters');
    $stats->match_duration = $request->input('match_duration');
    $stats->save();

  $match = \App\Match::find($id);
  $match->score_team_1 = $request->input('nb_points_team1');
  $match->score_team_2 = $request->input('nb_points_team2');
  $match->save();
  }

  //ENDOFMATCH

  //TEAMS
  public function teams($id = null)
  {

    $teams = Team::get();

        //$now = Carbon::now();
        return view('admin.teams', ['teams'=>$teams]);
    }

  public function create_team()
  {
    //$countries = Country::pluck("country_name", "id");
    return view('admin.CreateTeam');//, compact('countries'));

  }

  public function store_team(Request $request)
  {
    $newteam = DB::table('teams')->insertGetId(
    ['team_name'=>$request->input('team_name'),
    'nb_players'=>$request->input('nb_players'),
    'nb_matches'=>$request->input('nb_matches'),
    'coach_name'=>$request->input('coach_name'),
    'country_id'=>$request->input('country_id'),
  ]);

    $teamid = \App\Team::where('team_name', $request->input('team_name'))->first();

    $teamstat = DB::table('stats_teams')->insertGetId(
      ['id_team'=>$teamid,
      'nb_win'=>$request->input('nb_win'),
      'nb_loose'=>$request->input('nb_loose'),
      'nb_played_match'=>$request->input('nb_matches'),
      'nb_points'=>$request->input('nb_points'),
      'nb_rebounds'=>$request->input('nb_rebounds'),
      'nb_faults'=>$request->input('nb_faults'),
      'nb_assists'=>$request->input('nb_assists'),
      'nb_played_time'=>$request->input('nb_played_time'),
      'weight'=>$request->input('weight'),
      'age_average'=>$request->input('age_average'),

      ]);

  }    
  //END OF TEAMS

  //PLAYERS

  public function players()
  {
    $players = Player::get();
    return view('admin.players', ['players' => $players]);
  }

  public function create_player()
  {
    //$countries = Country::pluck("country_name", "id");
    return view('admin.CreatePlayer');//, compact('countries'));

  }

  public function store_player(Request $request)
  {
    $newplayer = DB::table('players')->insertGetId(
    ['player_name'=>$request->input('player_name'),
    'birthdate'=>$request->input('birthdate'),
    'height'=>$request->input('height'),
    'weight'=>$request->input('weight'),
    //'team_id'=>$request->input('team_id'),
    'team_id'=>3,
  ]);

    $playerid = \App\Player::where('player_name', $request->input('player_name'))->first();

    $teamstat = DB::table('stats_players')->insertGetId(
      ['id_player'=>$playerid->id,
      'id_match'=>4,
      'nb_match'=>$request->input('nb_match'),
      'nb_points'=>$request->input('nb_points'),
      'nb_faults'=>$request->input('nb_faults'),
      'nb_rebounds'=>$request->input('nb_rebounds'),
      'nb_assists'=>$request->input('nb_assists'),
      'ban'=>$request->input('ban'),
      'game_time'=>$request->input('game_time'),
      'no_game_time'=>$request->input('no_game_time'),
      ]);

}
}
