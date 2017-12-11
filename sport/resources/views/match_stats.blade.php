@extends('layouts.app')

	{{--
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>
	--}}
	

@section('content')

<div class="table-responsive stats_match">
    <div class="flex {{$match->score_team_1 > $match->score_team_2 ? 'win_team_1' : 'win_team_2'}}">
        <div class="logo_team"><img src="{{$match->team1->team_logo}}"></div>
        <p class="team1">{{$match->score_team_1}}</p>
        <p> | </p>
        <p class="team2">{{$match->score_team_2}}</p>
        <div class="logo_team"><img src="{{$match->team2->team_logo}}"></div>
    </div>
    <table class="table table-striped list-match">
        <tbody>
            <tr>
                <td>Nombre de points : </td>
                <td class="data">{{$match->stats_match->nb_points}}</td>
            </tr>
            <tr>
                <td>Nombre de rebonds : </td>
                <td class="data">{{$match->stats_match->nb_rebounds}}</td>
            </tr>
            <tr>
                <td>Nombre de passes : </td>
                <td class="data">{{$match->stats_match->nb_assists}}</td>
            </tr>
            <tr>
                <td>Nombre de fautes : </td>
                <td class="data">{{$match->stats_match->nb_faults}}</td>
            </tr>
            <tr>
                <td>Nombre de supporters : </td>
                <td class="data">{{$match->stats_match->nb_supporter}}</td>
            </tr>
            <tr>
                <td>Durée du match : </td>
                <td class="data">{{gmdate("H:i:s", $match->stats_match->match_duration)}}</td>
            </tr>
            <tr>
                <td>Pays : {{$match->playground_used->country_playground->country_name}}</td>
                <td><img src="{{$match->playground_used->country_playground->flag}}"></td>
            </tr>
            <tr>
                <td>Terrain : </td>
                <td class="data">{{$match->playground_used->playground_name}}</td>
            </tr>
        </tbody>
    </table>
    <div class="playground"><img src="{{$match->playground_used->playground_picture}}"></div>
</div>
{{-- <div>

    	<div class="picture">
    		<img class="logo" src="{{$match->team_logo}}">
    	</div>
    	<h3>{{$match->team_name}}</h3>

        <p>Coach : {{$match->coach_name}}</p>
        <p>Nombre de joueurs : {{$match->nb_players}}</p>
        <p>Nombre de match gagnés : {{$match->stats->nb_win}}</p>
    	<p>Nombre de match perdus : {{$match->stats->nb_loose}}</p>
        <p>Nombre de match joué : {{$match->stats->nb_played_match}}</p>
    	<p>Nombre d'équipe recontrées : {{$match->stats->nb_team_played}}</p>
        <p>Nombre de points marqués : {{$match->stats->nb_points}}</p>
        <p>Nombre de rebonds : {{$match->stats->nb_rebounds}}</p>
    	<p>Nombre de fautes : {{$match->stats->nb_faults}}</p>
    	<p>Nombre de passes : {{$match->stats->nb_assists}}</p>
    	<p>temps de jeu : {{$match->stats->nb_played_time}}</p>
    	<p>Poids de l'équipe : {{$match->stats->weight}}</p>
    	<p>Moyenne d'âge: {{$match->stats->age_average}}</p>
    	
    </div>
--}}


@endsection