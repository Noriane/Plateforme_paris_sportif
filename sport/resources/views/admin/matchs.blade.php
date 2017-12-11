@extends('layouts.app')

@section('content')

<a class ="btn btn-group btn-success" href="{{URL::to('admin/Matchs/Add')}}">Create a match</a>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	    		<td>Date</td>
	    		<td>Team 1</td>
	    		<td>Team 1 Points</td>
	    		<td>Team 2</td>
	    		<td>Team 2 Points</td>
	    		<td>Playground</td>
	    		<td>Action</td>
	    	</tr>
	    </thead>
	    <tbody>
	    	<tr>
	    	@foreach ($matches as $match)
	    		<td>{{$match->match_date}}</td>
	    		<td>{{$match->team1->team_name}}</td>
                <td>{{$match->score_team_1}}</td>
                <td>{{$match->team2->team_name}}</td>
                <td>{{$match->score_team_2}}</td>
	    		<td>{{$match->playground1->playground_name}}</td>
	    		<td><a class= "btn btn-primary" href = "">Edit</a><a class = "btn btn-success" href="{{URL::to('admin/Matchs/add_stats/'.$match->id)}}">Add Stats</a>
	    			{!! Form::open(["method" => "delete", "route" => ["admin.matchs.delete", $match->id]]) !!}
	    			{!! Form::submit('Delete') !!}
	    			{!! Form::close() !!}
	    		</td>
	    	</tr>
	   		@endforeach
   		</tbody>
    </table>

@endsection

