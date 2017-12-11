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
	    	@foreach ($bets as $bet)

                @if ($bet->end_time->lt($date_now) && $passed == false)
                    @php ($passed = true)
                    <tr class="separator"><td colspan="8">Passed matches</td></tr>
                @elseif ($bet->end_time->gt($date_now) && $coming == false)
                    @php ($coming = true)
                    <tr class="separator"><td colspan="8">Upcoming matches</td></tr>
                @endif
                
                <tr class="date">
                    <td colspan="11" rowspan="" headers="">{{$bet->match['match_date']}}</td>
                </tr>

                <tr class="">
                    <td></td>
                    @if ($bet->end_time->gt($date_now))
                    <td><a href="" class="btn btn-primary">Bet now</a></td>
                    @endif
                    <td class="cote team1"><div>{{$bet->cote_team_1}}</div></td>
                    <td class="name team1">{{$bet->team1->team_name}}</td>
                    <td><img src="{{$bet->team1->team_logo}}"></td>
                    <td></td>
                    <td> | </td>
                    <td></td>
                    <td><img src="{{$bet->team2->team_logo}}"></td>
                    <td class="name team2">{{$bet->team2->team_name}}</td>
                    <td class="cote team2"><div>{{$bet->cote_team_2}}</div></td>
                    @if ($bet->end_time->gt($date_now))
                    <td><a href="" class="btn btn-primary">Bet now</a></td>
                    <td></td>
                    @endif
                </tr>
	   		@endforeach
   		</tbody>
    </table>
</div>



@endsection