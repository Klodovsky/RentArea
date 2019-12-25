@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
    <h1>{!! trans('home.Update') !!} {!! trans('home.Gearbox') !!}</h1>
    {!! Form::model($gearbox, ['method' => 'PATCH', 'action' => ['CarGearboxController@update', $gearbox->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit(Lang::get('home.Update'), ['class' => 'btn btn-primary']) !!}
    </div>
    @include('includes.form-errors')
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['CarGearboxController@destroy', $gearbox->id]]) !!}
    <div class="form-group">
        {!! Form::submit(Lang::get('home.Delete'), ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
    </div>
@stop