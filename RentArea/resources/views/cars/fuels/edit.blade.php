@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
    <h1>{!! trans('home.Update') !!} {!! trans('home.Type_of_fuel') !!}</h1>
    {!! Form::model($fuel, ['method' => 'PATCH', 'action' => ['CarFuelController@update', $fuel->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit(Lang::get('home.Update'), ['class' => 'btn btn-primary']) !!}
    </div>
    @include('includes.form-errors')
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['CarFuelController@destroy', $fuel->id]]) !!}
    <div class="form-group">
        {!! Form::submit(Lang::get('home.Delete'), ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
    </div>
@stop