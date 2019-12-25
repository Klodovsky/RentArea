@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
    <h1>{!! trans('home.Update') !!} {!! trans('home.Car') !!} {!! trans('home.Type') !!}</h1>
    {!! Form::model($type, ['method' => 'PATCH', 'action' => ['CarTypeController@update', $type->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit(Lang::get('home.Update'), ['class' => 'btn btn-primary']) !!}
    </div>
    @include('includes.form-errors')
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['CarTypeController@destroy', $type->id]]) !!}
    <div class="form-group">
        {!! Form::submit(Lang::get('home.Delete'), ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
    </div>
@stop