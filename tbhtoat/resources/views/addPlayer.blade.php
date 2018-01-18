@extends('layouts.app')

@section('content')



    <div class="col-sm-6">
        <h1>Add Player Data Below</h1>

        {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}
        <div class="form-group">
            {!! Form::label('playerName', 'Player Name:') !!}
            {!! Form::text('playerName', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('number', 'Jersey Number:') !!}
            {!! Form::text('number', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('position', 'Position:') !!}
            {!! Form::text('position', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('goalsScored', 'Goals Scored:') !!}
            {!! Form::text('goalsScored', null, ['class'=>'form-control']) !!}
        </div>
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('shots', 'Shots:') !!}
            {!! Form::text('shots', null, ['class'=>'form-control']) !!}
        </div>

        {{ csrf_field() }} {{--"csrf_field" allows the input to persist to the model without error...not really explained just works--}}

           <div class="form-group">
            {!! Form::label('assistsPlayer', 'Assists:') !!}
            {!! Form::text('assistsPlayer', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('savesPlayer', 'Saves:') !!}
            {!! Form::text('savesPlayer', null, ['class'=>'form-control']) !!}
        </div>

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