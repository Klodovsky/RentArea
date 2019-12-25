@extends('layouts.admin')
@section('content')
    <h1>{!! trans('home.Create') !!} {!! trans('home.Post') !!}</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', Lang::get('home.TITLE')) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', Lang::get('home.Category')) !!}
        {!! Form::select('category_id', [''=> 'Choose category'] + $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', Lang::get('home.Photo')) !!}
        {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', Lang::get('home.BODY')) !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>10]) !!}
    </div>
    @php($create_post = Lang::get('home.Create') . ' ' . Lang::get('home.Post') )
<!--     <div class="form-group">
        {!! Form::submit($create_post, ['class' => 'btn btn-primary']) !!}
    </div> -->
    @include('includes.form-errors')
    {!! Form::close() !!}
@stop