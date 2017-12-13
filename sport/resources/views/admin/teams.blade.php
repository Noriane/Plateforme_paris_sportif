@extends('layouts.app')

@section('content')

<a class="btn btn-success" href={{URL::to('admin/Team/Add')}} >Create A TEAM</a>

<h1>{{$teams->count()}} {{$teams->count() > 1 ? 'teams' : 'team'}}</h1>
<div class="table-responsive">
    <table class="table table-striped">
	    <tbody>
	    	<tr>
	    		<td>Team name</td>
	    		<td>Coach name</td>
	    		<td>Nb Players</td>
	    		<td>Nb Matchs</td>
	    		<td>Country</td>
	    	</tr>
	    	<tr>
	    	@foreach ($teams as $team)
	    		<td>{{$team->team_name}}</td>
	    		<td>{{$team->coach_name}}</td>
	    		<td>{{$team->nb_players}}</td>
	    		<td>{{$team->nb_matches}}</td>
	    		<td>{{$team->country_id}}</td>
	    	</tr>
	   		@endforeach
   		</tbody>
    </table>
</div>


@endsection
