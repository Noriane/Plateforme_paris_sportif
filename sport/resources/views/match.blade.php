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
            @php
                $passed = false;
                $coming = false;
            @endphp
	    	@foreach ($matches as $match)
                @if ($match->match_date->lt($date_now) && $passed == false)
                    @php ($passed = true)
                    <tr class="separator"><td colspan="8">Passed matches</td></tr>
                @elseif ($match->match_date->gt($date_now) && $coming == false)
                    @php ($coming = true)
                    <tr class="separator"><td colspan="8">Upcoming matches</td></tr>
                @endif
                <tr class="date">
                    <td colspan="8" rowspan="" headers="">{{$match->match_date->format('l jS \of F Y h:i:s A')}}</td>
                </tr>
                <!-- Matchs à venir -->
                @if ($match->match_date->gt($date_now))

                    <tr class="{{$match->score_team_1 > $match->score_team_2 ? 'win_team_1' : 'win_team_2'}}">
                        <td></td>
                        <td class="team1-name">{{$match->team1->team_name}}</td>
                        <td><img src="{{$match->team1->team_logo}}"></td>
                        <td class="score team_1"></td>
                        <td>VS</td>
                        <td class="score team_2"></td>
                        <td><img src="{{$match->team2->team_logo}}"></td>
                        <td class="team2-name">{{$match->team2->team_name}}</td>
                        <td></td>
                    </tr>
                @else
                <!-- Matchs passés -->
                    <tr class="{{$match->score_team_1 > $match->score_team_2 ? 'win_team_1' : 'win_team_2'}}">
                        <td></td>
                        <td class="team1-name">{{$match->team1->team_name}}</td>
                        <td><img src="{{$match->team1->team_logo}}"></td>
                        <td class="score team_1">{{$match->score_team_1}}</td>
                        <td>|</td>
                        <td class="score team_2">{{$match->score_team_2}}</td>
                        <td><img src="{{$match->team2->team_logo}}"></td>
                        <td class="team2-name">{{$match->team2->team_name}}</td>
                        <td class="stats"><a href="match/{{$match->id}}/addstats">Add stats</a></td>
                        <td class="stats"><a href="match/{{$match->id}}/stats">Stats</a></td>
                    </tr>
                @endif

	   		@endforeach
   		</tbody>
    </table>
</div>



@endsection