@extends('layouts.admin')
@section('content')
    @if(count($cars) > 0)
        <h1>{!! trans('home.Cars') !!}</h1>
        <table class="table-responsive-design">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">{!! trans('home.Image') !!}</th>
                <th scope="col">{!! trans('home.PRICE') !!}</th>
                <th scope="col">{!! trans('home.Characteristics') !!}</th>
                <th scope="col">Extra</th>
                <th scope="col">{!! trans('home.AVAILABLE') !!}</th>
            </tr>
            </thead>
            <tbody>
            @if($cars)
                @foreach($cars as $car)
                    <tr>
                        <td data-label="ID">{{$car->id}}</td>
                        <td valign="center" data-label="Name"><a href="{{route('cars.edit', $car->id)}}">{{$car->name}}</a></td>
                        <td data-label="{!! trans('home.Image') !!}"><img height="50" src="{{$car->photo ? $car->photo->file : 'http://via.placeholder.com/200x200'}}" alt=""></td>
                        <td data-label="{!! trans('home.PRICE') !!}">{{$car->price_per_day_car}}$</td>
                        <td data-label="{!! trans('home.Characteristics') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('home.Type') !!} {!! trans('home.Car') !!}:</td><td>{{$car->type->name}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.ac') !!}:</td> <td> {{ ($car->ac == 1) ? 'Yes' : 'No' }} </td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Gearbox') !!}:</td> <td>{{$car->gearbox->name}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.no.') !!} {!! trans('home.Passengers') !!}:</td> <td>{{ $car->passengers }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.no.') !!} {!! trans('home.Doors') !!}:</td> <td>{{ $car->doors }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.no.') !!} {!! trans('home.Suitcases') !!}:</td> <td>{{ $car->capacity }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Location') !!}:</td> <td>{{ $car->branch->location }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Types_of_fuel') !!}:</td> <td>{{ $car->fuel->name }}</td>
                                       </tr>
                                       <tr>
                                        <td>Additional Info:</td> <td>{{ $car->aditional_info }}</td>
                                       </tr>
                                       </table>" title="Characteristics" data-html="true" class="btn btn-info">{!! trans('home.Characteristics') !!}</a>
                        </td>
                        <td data-label="Optional Equipment:" align="left" width="80%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('home.Optional') !!} {!! trans('home.GPS') !!} {!! trans('home.PRICE') !!}:</td> <td>{{$car->gps}}$</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Optional') !!} {!! trans('home.CHILD_SEAT') !!} {!! trans('home.PRICE') !!}:</td> <td>{{$car->baby_chair}}$</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Optional') !!} {!! trans('home.BABY_CHAIR') !!} {!! trans('home.PRICE') !!}:</td> <td>{{$car->child_seat}}$</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Optional') !!} {!! trans('home.WI_FI_ROUTER') !!} {!! trans('home.PRICE') !!}:</td> <td>{{$car->wifi_price}}$</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Optional') !!} {!! trans('home.SNOW_CHAIN') !!} {!! trans('home.PRICE') !!}:</td> <td>{{$car->snow_chains}}$</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Optional') !!} {!! trans('home.SKY_SUPPORT') !!} {!! trans('home.PRICE') !!}:</td> <td>{{$car->sky_support}}$</td>
                                       </tr>
                                       </table>" title="Extra" data-html="true" class="btn btn-info">Extra</a>
                        </td>
                        <td data-label="Available">
                            @if($car->is_available == 0)
                                {!! Form::model($car, ['method' => 'PATCH', 'action' => ['CarController@update', $car->id] ]) !!}
                                <input type="hidden" name="is_available" value="1">
                                {!! Form::submit(Lang::get('home.Yes'), ['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @elseif($car->is_available == 1)
                                {!! Form::model($car, ['method' => 'PATCH', 'action' => ['CarController@update', $car->id] ]) !!}
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
        <h1>{!! trans('home.Not') !!} {!! trans('home.Cars') !!}</h1>
    @endif
@stop
@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@stop