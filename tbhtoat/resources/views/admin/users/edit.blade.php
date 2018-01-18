@extends('layouts.admin')


@section('content')

    <h1>Edit Users</h1>

    <div class="row">


        <div class="col-sm-3">


            <img src="{{$user->photo ? $user->photo->file : "http://placehold.it/300x300"}}" alt=""
                 class="img-responsive img-rounded">


        </div>

        <div class="col-sm-9">

            {{--The "Form::model" allows you to display that user's specific info when you click on the link for the Edit Form--}}
            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }} {{--"csrf_field" allows the input to persist to the model without error...not really explained just works}}

        {{-- The "file" in Form: file allows users to upload a file (in this case a photo id)--}}
            <div class="form-group">
                {!! Form::label('photo_id', 'Upload Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit User', ['class'=>'btn btn-primary col-sm-2']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id], 'class'=>'pull-right']) !!}

            <div class="form-group">

                {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}

            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">

        @include('includes.form-error')

    </div>





@stop