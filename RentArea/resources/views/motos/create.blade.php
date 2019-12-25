@extends('layouts.admin')
@section('content')
    <h1>{!! trans('home.Create') !!} {!! trans('home.Moto') !!}</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'MotoController@store', 'files'=>true]) !!}
    @include('includes.form-errors')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', Lang::get('home.Name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('branch_id', Lang::get('home.Location')) !!}
                {!! Form::select('branch_id', [''=> 'Choose Location'] + $branches, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                @php($day_price = Lang::get('home.PRICE') . '/' . Lang::get('home.Day') . '($)')
                {!! Form::label('price_per_day', $day_price) !!}
                {!! Form::text('price_per_day', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('type', Lang::get('home.Type')) !!}
                {!! Form::text('type', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('max_speed', Lang::get('home.Max_speed')) !!}
                {!! Form::text('max_speed', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('max_weight', Lang::get('home.Max_weight')) !!}
                {!! Form::text('max_weight', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('fuel_economy', Lang::get('home.Fuel_Economy')) !!}
                {!! Form::text('fuel_economy', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('engine', Lang::get('home.Engine')) !!}
                {!! Form::text('engine', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', Lang::get('home.Image')) !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(Lang::get('home.Create'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop