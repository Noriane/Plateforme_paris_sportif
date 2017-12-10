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

<h1>{{$matches->count()}} {{$matches->count() > 1 ? 'matchs' : 'match'}}</h1>

<div class="table-responsive">
    <table class="table table-striped list-match">
	    <tbody>
	    	@foreach ($matches as $match)
	    	<tr class="{{$match->score_team_1 > $match->score_team_2 ? 'win_team_1' : 'win_team_2'}}">
                <td class="team1-name">{{$match->team1->team_name}}</td>
                <td><img src="{{$match->team1->team_logo}}"></td>
                <td class="score team_1">{{$match->score_team_1}}</td>
                <td>|</td>
                <td class="score team_2">{{$match->score_team_2}}</td>
                <td><img src="{{$match->team2->team_logo}}"></td>
	    		<td class="team2-name">{{$match->team2->team_name}}</td>
	    	</tr>
	   		@endforeach
   		</tbody>
    </table>
</div>



@endsection