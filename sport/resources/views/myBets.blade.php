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

<div class="table-responsive">
    <table class="table table-striped list-bets">
	    <tbody>
            @php 
                $passed = false;
                $coming = false;
            @endphp

	    	@foreach ($bet_user as $bet)

                @if ($bet->bets->end_time->lt($date_now) && $passed == false)
                    @php ($passed = true)
                    <tr class="separator"><td colspan="8">Passed matches</td></tr>
                @elseif ($bet->bets->end_time->gt($date_now) && $coming == false)
                    @php ($coming = true)
                    <tr class="separator"><td colspan="8">Upcoming matches</td></tr>
                @endif
                <tr class="date">
                    <td colspan="11" rowspan="" headers="">{{$bet->match['match_date']}}</td>
                </tr>

                <tr class="">
                    <td></td>
                    <td class="cote team1"><div>{{$bet->bets->cote_team_1}}</div></td>
                    <td class="name team1">{{$bet->bets->match->team1->team_name}}</td>
                    <td><img src="{{$bet->bets->match->team1->team_logo}}"></td>
                    <td>{{$bet->bets->match->score_team_1}}</td>
                    <td> | </td>
                     <td>{{$bet->bets->match->score_team_2}}</td>
                    <td><img src="{{$bet->bets->match->team2->team_logo}}"></td>
                    <td class="name team2">{{$bet->bets->match->team2->team_name}}</td>
                    <td class="cote team2"><div>{{$bet->bets->cote_team_2}}</div></td>

                    @if ($bet->bets->end_time->lt($date_now))
                        @if ($bet->bets->match->score_team_1 > $bet->bets->match->score_team_2)
                            @php ($winner = $bet->bets->match->team_1)
                        @else
                            @php ($winner = $bet->bets->match->team_2)
                        @endif
                        @if ($bet->team_bet_id == $winner)
                        <td>You win !</td>
                        @else
                        <td>You loose :(</td>
                        @endif
                    @else
                    <td></td>
                    @endif
                </tr>   
      
            @endforeach
   		</tbody>
    </table>
</div>



@endsection