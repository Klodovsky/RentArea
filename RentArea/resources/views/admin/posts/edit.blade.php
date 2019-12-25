@extends('layouts.admin')
@section('content')
    <h1>{!! trans('home.Update') !!} {!! trans('home.Post') !!}</h1>
    <div class="col-md-3">
        <img class="img-responsive img-rounded" src="{{$post->photo ? $post->photo['file'] : 'http://via.placeholder.com/200x200'}}" alt="">
    </div>
    <div class="col-md-9">
        {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', Lang::get('home.TITLE')) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', Lang::get('home.Category')) !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', Lang::get('home.Photo')) !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body', Lang::get('home.BODY')) !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>10]) !!}
        </div>
        @php($update_post = Lang::get('home.Update') . ' ' . Lang::get('home.Post') )
        @php($delete_post = Lang::get('home.Delete') . ' ' . Lang::get('home.Post') )
<!--         <div class="form-group">
            {!! Form::submit($update_post, ['class' => 'btn btn-primary']) !!}
        </div> -->
        @include('includes.form-errors')
        {!! Form::close() !!}
        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
<!--         <div class="form-group">
            {!! Form::submit($delete_post, ['class' => 'btn btn-danger']) !!}
        </div> -->
        {!! Form::close() !!}
    </div>
@stop