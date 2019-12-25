@extends('layouts.admin')
@section('content')
        <div class="col-md-6">
            <h1>{!! trans('home.Create') !!} {!! trans('home.Gearbox') !!}</h1>
            {!! Form::open(['method' => 'POST', 'action' => 'CarGearboxController@index']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(Lang::get('home.Create'), ['class' => 'btn btn-primary']) !!}
            </div>
            @include('includes.form-errors')
            {!! Form::close() !!}
        </div>
        @if(count($gearboxes) > 0)
        <div class="col-md-6">
            <h1>{!! trans('home.Create') !!} {!! trans('home.Gearboxes') !!}</h1>
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
                @if($gearboxes)
                    @foreach($gearboxes as $gearbox)
                        <tr>
                            <td data-label="ID">{{$gearbox->id}}</td>
                            <td data-label="Name"><a href="{{ route('cars.gearboxes.edit', $gearbox->id) }}">{{$gearbox->name}}</a></td>
                            <td data-label="{!! trans('home.CREATED') !!}">{{$gearbox->created_at ? $gearbox->created_at->diffForHumans() : 'no date'}}</td>
                            <td data-label="{!! trans('home.UPDATED') !!}">{{$gearbox->updated_at ? $gearbox->updated_at->diffForHumans() : 'no date'}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @else
        <h1>{!! trans('home.No') !!} {!! trans('home.Gearboxes') !!}</h1>
    @endif
@stop