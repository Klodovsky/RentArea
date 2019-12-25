@extends('layouts.admin')
@section('content')
    @if(count($motos) > 0)
        <h1>{!! trans('home.Motos') !!}</h1>
        <table class="table-responsive-design">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">{!! trans('home.Image') !!}</th>
                <th scope="col">{!! trans('home.PRICE') !!}</th>
                <th scope="col">{!! trans('home.Characteristics') !!}</th>
                <th scope="col">{!! trans('home.AVAILABLE') !!}</th>
            </tr>
            </thead>
            <tbody>
            @if($motos)
                @foreach($motos as $moto)
                    <tr>
                        <td data-label="ID">{{$moto->id}}</td>
                        <td valign="center" data-label="Name"><a href="{{route('motos.edit', $moto->id)}}">{{$moto->name}}</a></td>
                        <td data-label="{!! trans('home.Image') !!}"><img height="50" src="{{$moto->photo ? $moto->photo->file : 'http://via.placeholder.com/200x200'}}" alt=""></td>
                        <td data-label="{!! trans('home.PRICE') !!}">{{$moto->price_per_day}}$</td>
                        <td data-label="{!! trans('home.Characteristics') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('home.Moto_Type') !!}:</td><td>{{$moto->type}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Max_weight') !!}:</td><td>{{$moto->max_weight}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Max_speed') !!}:</td><td>{{$moto->max_speed}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Fuel_Economy') !!}:</td><td>{{$moto->fuel_economy}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Engine') !!}:</td><td>{{$moto->engine}}</td>
                                       </tr>
                                       </table>" title="{!! trans('home.Characteristics') !!}" data-html="true" class="btn btn-info">{!! trans('home.Characteristics') !!}</a>
                        </td>
                        <td data-label="Available">
                            @if($moto->is_available == 0)
                                {!! Form::model($moto, ['method' => 'PATCH', 'action' => ['MotoController@update', $moto->id] ]) !!}
                                <input type="hidden" name="is_available" value="1">
                                {!! Form::submit(Lang::get('home.Yes'), ['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @elseif($moto->is_available == 1)
                                {!! Form::model($moto, ['method' => 'PATCH', 'action' => ['MotoController@update', $moto->id] ]) !!}
                                <input type="hidden" name="is_available" value="0">
                                {!! Form::submit(Lang::get('home.Not'), ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    @else
        <h1>{!! trans('home.Not') !!} {!! trans('home.Motos') !!}</h1>
    @endif
@stop
@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@stop