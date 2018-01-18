@extends('layouts.admin')




@section('content')
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo->file}}" alt="" class="img-responsive">
        </div>
        <div class="col-sm-7">
            <h1>Update Post</h1>

            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

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
                {!! Form::submit('Edit Blog Post', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}



         {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id], 'class'=>'pull-right']) !!}

                 <div class="form-group-button">
                     {!! Form::submit('Delete Post', ['class'=>'btn btn-primary']) !!}
                 </div>

             {!! Form::close() !!}
        </div>
    </div>

    <div class="col-sm-6">
        @include('includes.form-error')
    </div>
@stop