@extends('layouts.app')

@section('content')



    <div class="col-sm-6">
        <h1>Add Game Data Below</h1>

        {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}
        <div class="form-group">
            {!! Form::label('datePlayed', 'Date Played:') !!}
            {!! Form::text('datePlayed', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('homeTeam', 'Home Team:') !!}
            {!! Form::text('homeTeam', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('awayTeam', 'Away Team:') !!}
            {!! Form::text('awayTeam', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('homeScore', 'Home Score:') !!}
            {!! Form::text('homeScore', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('awayScore', 'Away Score:') !!}
            {!! Form::text('awayScore', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('assistsGame', 'Assists:') !!}
            {!! Form::text('assistsGame', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gameShotsTaken', 'Shots Taken:') !!}
            {!! Form::text('gameShotsTaken', null, ['class'=>'form-control']) !!}
        </div>

        {{ csrf_field() }} {{--"csrf_field" allows the input to persist to the model without error...not really explained just works}}

    {{-- The "file" in Form: file allows users to upload a file (in this case a photo id)--}}
        <div class="form-group">
            {!! Form::label('penMin', 'Penalty Min:') !!}
            {!! Form::text('penMin', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Player', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection