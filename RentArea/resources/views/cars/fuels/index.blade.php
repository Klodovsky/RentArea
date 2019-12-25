@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
        <h1>{!! trans('home.Create') !!} {!! trans('home.Type_of_fuel') !!}</h1>
        {!! Form::open(['method' => 'POST', 'action' => 'CarFuelController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            @php($create_fuel = Lang::get('home.Create') . ' ' . Lang::get('home.Type_of_fuel') )
            {!! Form::submit($create_fuel, ['class' => 'btn btn-primary']) !!}
        </div>
        @include('includes.form-errors')
        {!! Form::close() !!}
    </div>
    @if(count($fuels) > 0)
    <div class="col-md-6">
        <h1>{!! trans('home.All') !!} {!! trans('home.Type_of_fuel') !!}</h1>
        <table class="table-responsive-design">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">{!! trans('home.CREATED') !!}</th>
                <th scope="col">{!! trans('home.UPDATED') !!}</th>
            </tr>
            </thead>
            <tbody>
            @if($fuels)
                @foreach($fuels as $fuel)
                    <tr>
                        <td data-label="ID">{{$fuel->id}}</td>
                        <td data-label="Name"><a href="{{ route('cars.fuels.edit', $fuel->id) }}">{{$fuel->name}}</a></td>
                        <td data-label="{!! trans('home.CREATED') !!}">{{$fuel->created_at ? $fuel->created_at->diffForHumans() : 'no date'}}</td>
                        <td data-label="{!! trans('home.UPDATED') !!}">{{$fuel->updated_at ? $fuel->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    @else
        <h1>{!! trans('home.Not') !!} {!! trans('home.Type_of_fuel') !!}</h1>
    @endif
@stop