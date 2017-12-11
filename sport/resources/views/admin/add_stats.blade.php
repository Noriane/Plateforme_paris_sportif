@extends('layouts.app')

@section('content')

<div>
    
    <h1>Add stats</h1>
    <div>
        


{!! Form::open(['url' => 'admin/Matchs/add_stats/'.$match_id]) !!}
        {!!Form::label('nb_points_team1', 'Score Team 1 :' )!!}
        {!!Form::text('nb_points_team1', null)!!}<br><br>
        {!!Form::label('nb_points_team2', 'Score Team 2 :' )!!}
        {!!Form::text('nb_points_team2', null)!!}<br><br>
        {!!Form::label('nb_rebounds', 'Rebounds : ' )!!}
        {!!Form::text('nb_rebounds', null)!!}<br><br>
        {!!Form::label('nb_assists', 'Assists : ' )!!}
        {!!Form::text('nb_assists', null)!!}<br><br>
        {!!Form::label('nb_faults', 'Faults : ' )!!}
        {!!Form::text('nb_faults', null)!!}<br><br>
        {!!Form::label('nb_supporters', 'Supporters : ' )!!}
        {!!Form::text('nb_supporters', null)!!}<br><br>
        {!!Form::label('match_duration', 'Match Duration : ' )!!}
        {!!Form::text('match_duration', null)!!}<br><br>

        {!! Form::submit('Submit !') !!}
    {!! Form::close() !!}
    </div>

</div>

@endsection