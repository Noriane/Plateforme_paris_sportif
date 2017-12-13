@extends('layouts.app')

@section('content')

<div>
    
    <h1>CREATE A Player</h1>
    <div>
        
{!! Form::open(['url' => 'admin/Player/Add']) !!}
        {!! Form::label('player_name', 'Player Name : ') !!}
        {!! Form::text('player_name') !!} <br><br>
        {!!Form::label('birthdate', 'Birthdate' )!!}
        {!!Form::date('birthdate')!!}<br><br>
        {!!Form::label('height', 'Height :' )!!}
        {!!Form::number('height')!!}<br><br>
        {!!Form::label('weight', 'Weight :' )!!}
        {!!Form::number('weight')!!}<br><br>
        {!!Form::label('team_id', 'Team :' )!!}
        {!!Form::select('team_id')!!}<br><br>
        
   

    <h1>Add Player Statistics</h1>
 
        
        {!! Form::label('nb_match', 'Number of matches : ') !!}
        {!! Form::number('nb_match')!!} <br><br>
        {!!Form::label('nb_points', 'Total points :' )!!}
        {!!Form::number('nb_points')!!}<br><br>
        {!!Form::label('nb_rebounds', 'Total rebounds' )!!}
        {!!Form::number('nb_rebounds')!!}<br><br>
        {!!Form::label('nb_faults', 'Total faults' )!!}
        {!!Form::number('nb_faults')!!}<br><br>
        {!!Form::label('nb_assists', 'Total assists' )!!}
        {!!Form::number('nb_assists')!!}<br><br>
        {!!Form::label('ban', 'Total Banned' )!!}
        {!!Form::number('ban')!!}<br><br>
        {!!Form::label('game_time', 'Total game time' )!!}
        {!!Form::number('game_time')!!}<br><br>
        {!!Form::label('no_game_time', 'Total no game time' )!!}
        {!!Form::number('no_game_time')!!}<br><br>
        {!! Form::submit('Submit !') !!}
    {!! Form::close() !!}
    </div>

</div>

@endsection