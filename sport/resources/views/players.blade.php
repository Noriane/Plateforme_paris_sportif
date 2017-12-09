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

    <table class="table table-striped">
    	<thead>
	    	<tr>
	    		<td></td>
	    		<td>Name</td>
	    		<td>Height</td>
	    		<td>Weight</td>
	    		<td>Team</td>
	    	</tr>
	    </thead>
	    <tbody>
	    	<tr>
	    	@foreach ($players as $player)
	    		<td class="picture"><img src="{{$player->player_picture}}"></td>
	    		<td>{{$player->player_name}}</td>
	    		<td>{{$player->height}} m</td>
	    		<td>{{$player->weight}} kg</td>
	    		<td>{{$player->team->team_name}}</td>
	    	</tr>
	   		@endforeach
   		</tbody>
    </table>

@endsection

@section('profile')

    <div>

    	<div class="picture">
    		<img src="{{$player->player_picture}}">
    	</div>
    	<h3>{{$player->player_name}}</h3>
    	<p>Taille : {{$player->height}} m</p>
    	<p>Poids : {{$player->weight}} kg</p>
    	<p>Equipe : {{$player->team->team_name}}</p>
    	<p>Date de naissance : {{$player->birthdate}}</p>
    	<p>Nombre de match joué : {{$player->stats->nb_match}}</p>
    	<p>Nombre de points marqués : {{$player->stats->nb_points}}</p>
    	<p>Nombre de rebonds : {{$player->stats->nb_rebounds}}</p>
    	<p>Nombre de fautes : {{$player->stats->nb_faults}}</p>
    	<p>Nombre de passes : {{$player->stats->nb_assists}}</p>
    	<p>Expulsion : {{$player->stats->ban}}</p>
    	<p>Temps de jeu : {{$player->stats->game_time}}</p>
    	<p>Temps de non-jeu: {{$player->stats->no_game_time}}</p>
    	
    </div>

@endsection