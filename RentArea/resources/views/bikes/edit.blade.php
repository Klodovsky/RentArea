@extends('layouts.admin')

@section('content')

    <h1>{!! trans('home.Update') !!} {!! trans('home.Bikes') !!}</h1>

    <div class="text-left">
        <img style="margin-bottom: 50px;max-width:400px" src="{{$bike->photo ? $bike->photo['file'] : 'http://via.placeholder.com/400x400'}}" alt="">
    </div>
    <div style="margin-bottom: 50px;" class="row">
        <div class="col-md-6">

            {!! Form::model($bike, ['method' => 'PATCH', 'action' => ['BikeController@update', $bike->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', Lang::get('home.Bike')) !!}
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
                {!! Form::label('bike_for', Lang::get('home.Bike_For')) !!}
                {!! Form::text('bike_for', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('max_weight', Lang::get('home.Maximum_weight_supported')) !!}
                {!! Form::text('max_weight', null, ['class' => 'form-control']) !!}
            </div>

        </div>

        <div class="col-md-6">


            <div class="form-group">
                {!! Form::label('handlebar_width', Lang::get('home.Handlebar_width')) !!}
                {!! Form::text('handlebar_width', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('wheel_size', Lang::get('home.Wheel_size')) !!}
                {!! Form::text('wheel_size', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('frame_size', Lang::get('home.Frame_size')) !!}
                {!! Form::text('frame_size', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('chain', Lang::get('home.Chain')) !!}
                {!! Form::text('chain', null, ['class' => 'form-control']) !!}
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

            {!! Form::open(['method' => 'DELETE', 'action' => ['BikeController@destroy', $bike->id]]) !!}

            <div class="form-group">
                {!! Form::submit(Lang::get('home.Delete'), ['class' => 'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@stop