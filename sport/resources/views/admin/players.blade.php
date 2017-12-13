@extends('layouts.app')

@section('content')

<a class="btn btn-success" href={{URL::to('admin/Player/Add')}} >Create A PLAYER</a>

<div class="table-responsive">
    <table class="table table-striped">
	    <tbody>
	    	<tr>
	    		<td>Picture<td>
	    		<td>Player name</td>
	    		<td>Birthdate</td>
	    		<td>Team</td>
	    		<td>Height</td>
	    		<td>Weight</td>
	    	</tr>
	    	<tr>
	    	@foreach ($players as $player)
	    		<td class="picture"><img src="{{$player->player_picture}}"></td>
	    		<td>{{$player->player_name}}</td>
	    		<td>{{$player->birthdate}}</td>
	    		<td>{{$player->team_id}}</td>
	    		<td>{{$player->height}}</td>
	    		<td>{{$player->weight}}</td>
	    	</tr>
	   		@endforeach
   		</tbody>
    </table>
</div>


@endsection