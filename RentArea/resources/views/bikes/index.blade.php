@extends('layouts.admin')
@section('content')
    @if(count($bikes) > 0)
        <h1>{!! trans('home.Bikes') !!}</h1>
        <table class="table-responsive-design">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">{!! trans('home.Image') !!}</th>
                <th scope="col">{!! trans('home.PRICE') !!}</th>
                <th scope="col">{!! trans('home.Characteristics') !!} </th>
                <th scope="col">{!! trans('home.AVAILABLE') !!}</th>
            </tr>
            </thead>
            <tbody>
            @if($bikes)
                @foreach($bikes as $bike)
                    <tr>
                        <td data-label="ID">{{$bike->id}}</td>
                        <td valign="center" data-label="Name"><a href="{{route('bikes.edit', $bike->id)}}">{{$bike->name}}</a></td>
                        <td data-label="{!! trans('home.Image') !!}"><img height="50" src="{{$bike->photo ? $bike->photo->file : 'http://via.placeholder.com/200x200'}}" alt=""></td>
                        <td data-label="{!! trans('home.PRICE') !!}">{{$bike->price_per_day}}$</td>
                        <td data-label="{!! trans('home.Characteristics') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('home.Bike_Type') !!}:</td><td>{{$bike->type}}</td>
                                       </tr>
                                        <tr>
                                        <td>{!! trans('home.Bike_For') !!} :</td><td>{{$bike->bike_for}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Maximum_weight_supported') !!} :</td><td>{{$bike->max_weight}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Handlebar_width') !!} :</td><td>{{$bike->handlebar_width}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Wheel_size') !!} :</td><td>{{$bike->wheel_size}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Frame_size') !!} :</td><td>{{$bike->frame_size}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Chain') !!} :</td><td>{{$bike->chain}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Location') !!} :</td><td>{{$bike->branch->location}}</td>
                                       </tr>
                                       </table>" title="{!! trans('home.Characteristics') !!}" data-html="true" class="btn btn-info">{!! trans('home.Characteristics') !!}</a>
                        </td>
                        <td data-label="{!! trans('home.AVAILABLE') !!}">
                            @if($bike->is_available == 0)
                                {!! Form::model($bike, ['method' => 'PATCH', 'action' => ['BikeController@update', $bike->id] ]) !!}
                                <input type="hidden" name="is_available" value="1">
                                {!! Form::submit(Lang::get('home.Yes'), ['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @elseif($bike->is_available == 1)
                                {!! Form::model($bike, ['method' => 'PATCH', 'action' => ['BikeController@update', $bike->id] ]) !!}
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
        <h1>{!! trans('home.Not') !!} {!! trans('home.Bikes') !!}</h1>
    @endif
@stop
@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@stop