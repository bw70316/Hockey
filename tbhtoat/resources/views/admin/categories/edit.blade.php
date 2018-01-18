@extends('layouts.admin')


@section('content')



        <div class="col-sm-6">

            <h1>Categories/Tags</h1>
            {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Tag', ['class'=>'btn btn-primary col-sm-4']) !!}
            </div>
            <div class="col-sm-4">
                <p>    </p>
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}


            <div class="form-group">
                {!! Form::submit('Delete Tag', ['class'=>'btn btn-danger col-sm-4']) !!}
            </div>

            {!! Form::close() !!}





        </div>
        <div class="col-sm-6">



        </div>

        @include('includes.form-error')



@stop