@extends('layouts.app')

@section('content')

<div>
    
    <h1>CREATE A Match AND a Bet</h1>
    <div>
        
{!! Form::open(['url' => 'admin/Matchs/Add']) !!}
        {!! Form::label('match_date', 'Date : ') !!}
        {!! Form::date('match_date') !!} <br><br>
        {!!Form::label('team_1', 'Team 1' )!!}
        {!!Form::select('team_1', $teams, null)!!}<br><br>
        {!!Form::label('cote_team_1', 'Bet Team 1 :' )!!}
        {!!Form::text('cote_team_1')!!}<br><br>
        {!!Form::label('team_2', 'Team 2' )!!}
        {!!Form::select('team_2', $teams, null)!!}<br><br>
        {!!Form::label('cote_team_2', 'Bet Team 2 :' )!!}
        {!!Form::text('cote_team_2')!!}<br><br>
        {!!Form::label('playground', 'Playground' )!!}
        {!!Form::select('playground', $playgrounds, null)!!}<br><br>
        {!! Form::submit('Submit !') !!}
    {!! Form::close() !!}
    </div>

</div>

@endsection