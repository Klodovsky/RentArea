@extends('layouts.admin')
@section('content')
        <div class="col-md-6">
            <h1>{!! trans('home.Create') !!} {!! trans('home.Car') !!} {!! trans('home.Type') !!}</h1>
            {!! Form::open(['method' => 'POST', 'action' => 'CarTypeController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                @php($create_car_type = Lang::get('home.Create') . ' ' . Lang::get('home.Car') . ' ' . Lang::get('home.Type'))
                {!! Form::submit($create_car_type, ['class' => 'btn btn-primary']) !!}
            </div>
            @include('includes.form-errors')
            {!! Form::close() !!}
        </div>
        @if(count($types) > 0)
        <div class="col-md-6">
            <h1>{!! trans('home.All') !!} {!! trans('home.Car') !!} {!! trans('home.Types') !!}</h1>
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
                @if($types)
                    @foreach($types as $type)
                        <tr>
                            <td data-label="ID">{{$type->id}}</td>
                            <td data-label="Name"><a href="{{ route('cars.types.edit', $type->id) }}">{{$type->name}}</a></td>
                            <td data-label="{!! trans('home.CREATED') !!}">{{$type->created_at ? $type->created_at->diffForHumans() : 'no date'}}</td>
                            <td data-label="{!! trans('home.UPDATED') !!}">{{$type->updated_at ? $type->updated_at->diffForHumans() : 'no date'}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @else
        <h1>{!! trans('home.Not') !!} {!! trans('home.Car') !!} {!! trans('home.Types') !!}</h1>
    @endif
@stop