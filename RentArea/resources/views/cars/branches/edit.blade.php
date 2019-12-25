@extends('layouts.admin')
@section('content')
    <h1>{!! trans('home.Update') !!} {!! trans('home.Branche') !!}</h1>
    {!! Form::model($branch, ['method' => 'PATCH', 'action' => ['CarBranchController@update', $branch->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address', Lang::get('home.Address')) !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('location', Lang::get('home.Location')) !!}
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone', Lang::get('home.Phone')) !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit(Lang::get('home.Update'), ['class' => 'btn btn-primary']) !!}
    </div>
    @include('includes.form-errors')
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['CarBranchController@destroy', $branch->id]]) !!}
    <div class="form-group">
        {!! Form::submit(Lang::get('home.Delete'), ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@stop