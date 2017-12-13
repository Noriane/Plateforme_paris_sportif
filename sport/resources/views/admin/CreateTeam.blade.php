@extends('layouts.app')

@section('content')

<div>
    
    <h1>CREATE A Team</h1>
    <div>
        
{!! Form::open(['url' => 'admin/Team/Add']) !!}
        {!! Form::label('team_name', 'Team Name : ') !!}
        {!! Form::text('team_name') !!} <br><br>
        {!!Form::label('nb_players', 'Number of players' )!!}
        {!!Form::text('nb_players')!!}<br><br>
        {!!Form::label('nb_matches', 'Number of matches :' )!!}
        {!!Form::text('nb_matches')!!}<br><br>
        {!!Form::label('coach_name', 'Coach :' )!!}
        {!!Form::text('coach_name')!!}<br><br>
        {!!Form::label('country_id', 'Country :' )!!}
        {!!Form::select('country_id')!!}<br><br>
        
   

    <h1>Add Team Statistics</h1>
 
        
        {!! Form::label('nb_win', 'Number of wins : ') !!}
        {!! Form::text('nb_win')!!} <br><br>
        {!!Form::label('nb_loose', 'Number of loose :' )!!}
        {!!Form::text('nb_loose')!!}<br><br>
        {!!Form::label('nb_team_played', 'Number of team played :' )!!}
        {!!Form::text('nb_team_played')!!}<br><br>
        {!!Form::label('nb_points', 'Total points :' )!!}
        {!!Form::text('nb_points')!!}<br><br>
        {!!Form::label('nb_rebounds', 'Total rebounds' )!!}
        {!!Form::text('nb_rebounds')!!}<br><br>
        {!!Form::label('nb_faults', 'Total faults' )!!}
        {!!Form::text('nb_faults')!!}<br><br>
        {!!Form::label('nb_assists', 'Total assists' )!!}
        {!!Form::text('nb_assists')!!}<br><br>
        {!!Form::label('nb_played_time', 'Total played time' )!!}
        {!!Form::text('nb_played_time')!!}<br><br>
        {!!Form::label('weight', 'Team weight' )!!}
        {!!Form::text('weight')!!}<br><br>
        {!!Form::label('age_average', 'Age average' )!!}
        {!!Form::text('age_average')!!}<br><br>
        {!! Form::submit('Submit !') !!}
    {!! Form::close() !!}
    </div>

</div>

@endsection