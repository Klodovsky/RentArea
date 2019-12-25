@extends('layouts.admin')
@section('content')
    <h1>{!! trans('home.Update') !!} {!! trans('home.Category') !!}</h1>
    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', Lang::get('home.Name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    @php($update_category = Lang::get('home.Update') . ' ' . Lang::get('home.Category') )
<!--     <div class="form-group">
        {!! Form::submit($update_category, ['class' => 'btn btn-primary']) !!}
    </div> -->
    @include('includes.form-errors')
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
    @php($delete_category = Lang::get('home.Delete') . ' ' . Lang::get('home.Category') )
<!--     <div class="form-group">
        {!! Form::submit($delete_category, ['class' => 'btn btn-danger']) !!}
    </div> -->
    {!! Form::close() !!}
@stop