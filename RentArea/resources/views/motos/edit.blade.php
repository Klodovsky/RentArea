@extends('layouts.admin')

@section('content')

    <h1>{!! trans('home.Update') !!} {!! trans('home.Moto') !!}</h1>

    <div class="text-left">
        <img style="margin-bottom: 50px;max-width:400px;" src="{{$moto->photo ? $moto->photo['file'] : 'http://via.placeholder.com/400x400'}}" alt="">
    </div>
    <div style="margin-bottom: 50px;" class="row">
        <div class="col-md-6">

            {!! Form::model($moto, ['method' => 'PATCH', 'action' => ['MotoController@update', $moto->id], 'files'=>true]) !!}

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
                {!! Form::submit(Lang::get('home.Update'), ['class' => 'btn btn-primary']) !!}
            </div>


            @include('includes.form-errors')

            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['MotoController@destroy', $moto->id]]) !!}

            <div class="form-group">
                {!! Form::submit(Lang::get('home.Delete'), ['class' => 'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@stop