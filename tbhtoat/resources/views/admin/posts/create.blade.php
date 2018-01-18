@extends('layouts.admin')




@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1>Create Post</h1>

            {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null, ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('author', 'Author:') !!}
                {!! Form::text('author', null, ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('body', 'Text:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>8]) !!}
            </div>
            {{ csrf_field() }}



            <div class="form-group">
                {!! Form::submit('Create Blog Post', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            </div>
    </div>

    <div class="col-sm-6">
    @include('includes.form-error')
    </div>
@stop