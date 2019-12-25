@extends('layouts.admin')
@section('content')
    @if(count($rentalcars) > 0)
        <h1>{!! trans('home.Rental') !!} {!! trans('home.Cars') !!}</h1>
        <div class="col-md-12">
            <table class="table-responsive-design">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{!! trans('home.Car') !!}</th>
                    <th scope="col">{!! trans('home.DATES_LOCATIONS') !!}</th>
                    <th scope="col">{!! trans('home.PRICE') !!}</th>
                    <th scope="col">{!! trans('home.User_information') !!}</th>
                    <th scope="col">{!! trans('home.Status') !!}</th>
                    <th scope="col">{!! trans('home.Action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @if($rentalcars)
                    @foreach($rentalcars as $rentalcar)
                        <tr>
                            <td data-label="ID">{{$rentalcar->id}}</td>
                            <td data-label="{!! trans('home.Car') !!}">{{$rentalcar->car->name}}</td>
                            <td data-label="{!! trans('home.DATES_LOCATIONS') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('home.Pickup_Location') !!}:</td><td>{{$rentalcar->pickupConfiguration->location}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Location') !!}:</td><td>{{$rentalcar->returnConfiguration ? $rentalcar->returnConfiguration->location : $rentalcar->pickupConfiguration->location}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Pickup_Date') !!}:</td><td>{{$rentalcar->pickupDate}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Date') !!}:</td><td>{{$rentalcar->returnDate}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Pickup_Time') !!}:</td><td>{{$rentalcar->pickupTime}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Time') !!}:</td><td>{{$rentalcar->returnTime}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Flight_number') !!}:</td><td>{{$rentalcar->flight_number}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Reservation_info') !!}:</td><td>{{$rentalcar->reservation_info}}</td>
                                        </tr>
                                       </table>" title="{!! trans('home.DATES_LOCATIONS') !!}" data-html="true" class="btn btn-info">{!! trans('home.DATES_LOCATIONS') !!}</a>
                            </td>
                            <td data-label="{!! trans('home.PRICE') !!}">{{$rentalcar->price}} $</td>
                            <td data-label="{!! trans('home.User_information') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>Name:</td><td>{{$rentalcar->user->name}}</td>
                                        </tr>
                                        <tr>
                                        <td>Email:</td><td>{{$rentalcar->user->email}}</td>
                                        </tr>
                                        @if($rentalcar->user->phone)
                                        <tr>
                                        <td>{!! trans('home.Phone') !!}:</td><td>{{$rentalcar->user->phone}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                        <td>{!! trans('home.City') !!}:</td><td>{{$rentalcar->user->city}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Address') !!}:</td><td>{{$rentalcar->user->address}}</td>
                                        </tr>
                                       </table>" title="{!! trans('home.User_information') !!}" data-html="true" class="btn btn-info">{!! trans('home.User_information') !!}</a>
                            </td>
                            <td data-label="{!! trans('home.Status') !!}">
                                @if($rentalcar->status == 0)
                                    <span>{!! trans('home.Not') !!} {!! trans('home.Confirmed') !!}</span>
                                @elseif($rentalcar->status == 1)
                                    <span>{!! trans('home.Confirmed') !!}</span>
                                @elseif($rentalcar->status == 2)
                                    <span>{!! trans('home.Car') !!} {!! trans('home.Delivered') !!}</span>
                                @elseif($rentalcar->status == 3)
                                    <span>{!! trans('home.Car') !!} {!! trans('home.Returned') !!}</span>
                                @endif
                            </td>
                            <td data-label="{!! trans('home.Action') !!}">
                                @if($rentalcar->status == 0)
                                    {!! Form::model($rentalcar, ['method' => 'PATCH', 'action' => ['RentalCarsController@update', $rentalcar->id] ]) !!}
                                    <input type="hidden" name="status" value="1">
                                    <div class="form-group">
                                        {!! Form::submit(Lang::get('home.Confirm'), ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @elseif($rentalcar->status == 1)
                                    @php($car_picked_up = Lang::get('home.Car') . ' ' . Lang::get('home.Picked_Up') )
                                    {!! Form::model($rentalcar, ['method' => 'PATCH', 'action' => ['RentalCarsController@update', $rentalcar->id] ]) !!}
                                    <input type="hidden" name="status" value="2">
                                    <div class="form-group">
                                        {!! Form::submit($car_picked_up, ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @elseif($rentalcar->status == 2)
                                    @php($car_returned = Lang::get('home.Car') . ' ' . Lang::get('home.Returned') )
                                    {!! Form::model($rentalcar, ['method' => 'PATCH', 'action' => ['RentalCarsController@update', $rentalcar->id] ]) !!}
                                    <input type="hidden" name="status" value="3">
                                    <div class="form-group">
                                        {!! Form::submit($car_returned, ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @else
        <h1>{!! trans('home.Not') !!} {!! trans('home.Reservations') !!} {!! trans('home.Cars') !!}</h1>
    @endif
@stop
@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@stop