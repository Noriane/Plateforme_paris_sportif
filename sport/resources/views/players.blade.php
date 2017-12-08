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