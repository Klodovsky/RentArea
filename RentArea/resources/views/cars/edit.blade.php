@extends('layouts.admin')

@section('content')

    <h1>{!! trans('home.Update') !!} {!! trans('home.Car') !!} </h1>

    <div class="text-left">
        <img class="img-responsive" style="margin-bottom: 50px;max-width:400px" src="{{$car->photo ? $car->photo['file'] : 'http://via.placeholder.com/400x400'}}" alt="">
    </div>
    <div style="margin-bottom: 50px;" class="row">
    <div class="col-md-6">

        {!! Form::model($car, ['method' => 'PATCH', 'action' => ['CarController@update', $car->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', Lang::get('home.Name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('type_id', Lang::get('home.Type')) !!}
            {!! Form::select('type_id', [''=> 'Choose type'] + $types, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ac', Lang::get('home.ac')) !!}
            {!! Form::select('ac', ['1'=> 'Yes', '0'=> 'No'], null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gearbox_id', Lang::get('home.Gearbox')) !!}
            {!! Form::select('gearbox_id', [''=> 'Choose gearbox'] + $gearboxes, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($no_passe = Lang::get('home.no.') . ' ' . Lang::get('home.Passengers'))
            {!! Form::label('passengers', $no_passe) !!}
            {!! Form::text('passengers', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($no_doors = Lang::get('home.no.') . ' ' . Lang::get('home.Doors'))
            {!! Form::label('doors', $no_doors) !!}
            {!! Form::text('doors', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($no_suitcases = Lang::get('home.no.') . ' ' . Lang::get('home.Suitcases'))
            {!! Form::label('capacity', $no_suitcases) !!}
            {!! Form::text('capacity', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('aditional_info', 'Additional Info:') !!}
            {!! Form::textarea('aditional_info', null, ['class' => 'form-control', 'rows'=>'5']) !!}
        </div>

        <div class="form-group">
            @php($day_price = Lang::get('home.PRICE') . '/' . Lang::get('home.Day') . '($)')
            {!! Form::label('price_per_day_car', $day_price) !!}
            {!! Form::text('price_per_day_car', null, ['class' => 'form-control']) !!}
        </div>


    </div>

    <div class="col-md-6">


        <div class="form-group">
            @php($optional_gps_price = Lang::get('home.Optional') . ' ' . Lang::get('home.GPS') . ' ' . Lang::get('home.PRICE'))
            {!! Form::label('gps', $optional_gps_price) !!}
            {!! Form::text('gps', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($optional_CHILD_SEAT_price = Lang::get('home.Optional') . ' ' . Lang::get('home.CHILD_SEAT') . ' ' . Lang::get('home.PRICE'))
            {!! Form::label('baby_chair', $optional_CHILD_SEAT_price) !!}
            {!! Form::text('baby_chair', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($optional_BABY_CHAIR_price = Lang::get('home.Optional') . ' ' . Lang::get('home.BABY_CHAIR') . ' ' . Lang::get('home.PRICE'))
            {!! Form::label('child_seat', $optional_BABY_CHAIR_price) !!}
            {!! Form::text('child_seat', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($optional_wifi_price_price = Lang::get('home.Optional') . ' ' . Lang::get('home.wifi_price') . ' ' . Lang::get('home.PRICE'))
            {!! Form::label('wifi_price', $optional_wifi_price_price) !!}
            {!! Form::text('wifi_price', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($optional_SNOW_CHAIN_price = Lang::get('home.Optional') . ' ' . Lang::get('home.SNOW_CHAIN') . ' ' . Lang::get('home.PRICE'))
            {!! Form::label('snow_chains', $optional_SNOW_CHAIN_price) !!}
            {!! Form::text('snow_chains', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($optional_SKY_SUPPORT_price = Lang::get('home.Optional') . ' ' . Lang::get('home.SKY_SUPPORT') . ' ' . Lang::get('home.PRICE'))
            {!! Form::label('sky_support', $optional_SKY_SUPPORT_price) !!}
            {!! Form::text('sky_support', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('branch_id', Lang::get('home.Branche')) !!}
            {!! Form::select('branch_id', [''=> 'Choose branch'] + $branches, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('fuel_id', Lang::get('home.Type_of_fuel')) !!}
            {!! Form::select('fuel_id', [''=> 'Choose fuel'] + $fuels, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', Lang::get('home.Image')) !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @php($update_car = Lang::get('home.Update') . ' ' . Lang::get('home.Car') )
            {!! Form::submit($update_car, ['class' => 'btn btn-primary']) !!}
        </div>

        @include('includes.form-errors')

        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['CarController@destroy', $car->id]]) !!}

        <div class="form-group">
            {!! Form::submit(Lang::get('home.Delete'), ['class' => 'btn btn-danger']) !!}
        </div>

        {!! Form::close() !!}

    </div>
    </div>

@stop