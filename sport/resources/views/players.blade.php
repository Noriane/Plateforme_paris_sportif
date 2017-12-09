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

<h1>{{$players->count()}} {{$players->count() > 1 ? 'Players' : 'Player'}}</h1>
<div class="table-responsive">
    <table class="table table-striped">
	    <tbody>
	    	@foreach ($players as $player)
	    	<tr class="{{$current_player->id == $player->id ? 'active' : ''}}">
	    		<td class="picture"><img src="{{$player->player_picture}}"></td>
	    		<td class="name"><a href="{{ route('player_stats', ['id'=>$player->id]) }}">{{$player->player_name}}</a></td>
	    		<td class="picture"><img src="{{$player->team->team_logo}}"></td>
	    		<td class="team">{{$player->team->team_name}}</td>
	    		{{--<td>{{$player->team->country->country_name}}</td>--}}
	    		<td class="picture flag"><img src="{{$player->team->country->flag}}"></td>
	    	</tr>
	   		@endforeach
   		</tbody>
    </table>
</div>


@endsection

@section('profile')

    <div>

    	<div class="picture">
    		<img class="profile" src="{{$current_player->player_picture}}">
    		<img class="logo" src="{{$current_player->team->team_logo}}">
    	</div>
    	<h3>{{$current_player->player_name}}</h3>
    	<p>Taille : {{$current_player->height}} m</p>
    	<p>Poids : {{$current_player->weight}} kg</p>
    	<p>Equipe : {{$current_player->team->team_name}}</p>
    	<p>Date de naissance : {{$current_player->birthdate}}</p>
    	<p>Nombre de match joué : {{$current_player->stats->nb_match}}</p>
    	<p>Nombre de points marqués : {{$current_player->stats->nb_points}}</p>
    	<p>Nombre de rebonds : {{$current_player->stats->nb_rebounds}}</p>
    	<p>Nombre de fautes : {{$current_player->stats->nb_faults}}</p>
    	<p>Nombre de passes : {{$current_player->stats->nb_assists}}</p>
    	<p>Expulsion : {{$current_player->stats->ban}}</p>
    	<p>Temps de jeu : {{$current_player->stats->game_time}}</p>
    	<p>Temps de non-jeu: {{$current_player->stats->no_game_time}}</p>
    	
    </div>

@endsection