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

<h1>{{$teams->count()}} {{$teams->count() > 1 ? 'teams' : 'team'}}</h1>
<div class="table-responsive">
    <table class="table table-striped">
	    <tbody>
	    	@foreach ($teams as $team)
            {{--<tr class="{{$current_team->id == $team->id ? 'active' : ''}}">--}}
	    	<tr class="">
	    		<td class="picture"><img src="{{$team->team_logo}}"></td>
	    		<td class="name"><a href="{{ route('team_stats', ['id'=>$team->id]) }}">{{$team->team_name}}</a></td>

	    		<td>{{$team->country->country_name}}</td>
	    		<td class="picture flag"><img src="{{$team->country->flag}}"></td>
	    	</tr>
	   		@endforeach
   		</tbody>
    </table>
</div>


@endsection

@section('profile')

    <div>

    	<div class="picture">
    		<img class="logo" src="{{$current_team->team_logo}}">
    	</div>
    	<h3>{{$current_team->team_name}}</h3>

        <p>Nombre de match gagnés : {{$current_team->stats->nb_win}}</p>
    	<p>Nombre de match perdus : {{$current_team->stats->nb_loose}}</p>
        <p>Nombre de match joué : {{$current_team->stats->nb_played_match}}</p>
    	<p>Nombre d'équipe recontrées : {{$current_team->stats->nb_team_played}}</p>
        <p>Nombre de points marqués : {{$current_team->stats->nb_points}}</p>
        <p>Nombre de rebonds : {{$current_team->stats->nb_rebounds}}</p>
    	<p>Nombre de fautes : {{$current_team->stats->nb_faults}}</p>
    	<p>Nombre de passes : {{$current_team->stats->nb_assists}}</p>
    	<p>temps de jeu : {{$current_team->stats->nb_played_time}}</p>
    	<p>Poids de l'équipe : {{$current_team->stats->weight}}</p>
    	<p>Moyenne d'âge: {{$current_team->stats->age_average}}</p>
    	
    </div>

@endsection