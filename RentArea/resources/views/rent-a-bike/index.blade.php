@extends('layouts.admin')
@section('content')
    @if(count($rentalbikes) > 0)
        <h1>{!! trans('home.Rental') !!} {!! trans('home.Bikes') !!}</h1>
        <div class="col-md-12">
            <table class="table-responsive-design">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{!! trans('home.Bike') !!}</th>
                    <th scope="col">{!! trans('home.DATES_LOCATIONS') !!}</th>
                    <th scope="col">{!! trans('home.PRICE') !!}</th>
                    <th scope="col">{!! trans('home.User_information') !!}</th>
                    <th scope="col">{!! trans('home.Status') !!}</th>
                    <th scope="col">{!! trans('home.Action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @if($rentalbikes)
                    @foreach($rentalbikes as $rentalbike)
                        <tr>
                            <td data-label="ID">{{$rentalbike->id}}</td>
                            <td data-label="{!! trans('home.Bike') !!}">{{$rentalbike->bike->name}}</td>
                            <td data-label="{!! trans('home.DATES_LOCATIONS') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('home.Pickup_Location') !!}:</td><td>{{$rentalbike->pickupConfiguration->location}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Location') !!}:</td><td>{{$rentalbike->returnConfiguration ? $rentalbike->returnConfiguration->location : $rentalbike->pickupConfiguration->location}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Pickup_Date') !!}:</td><td>{{$rentalbike->pickupDate}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Date') !!}:</td><td>{{$rentalbike->returnDate}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Pickup_Time') !!}:</td><td>{{$rentalbike->pickupTime}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Time') !!}:</td><td>{{$rentalbike->returnTime}}</td>
                                        </tr>
                                       </table>" title="{!! trans('home.DATES_LOCATIONS') !!}" data-html="true" class="btn btn-info">{!! trans('home.DATES_LOCATIONS') !!}</a>
                            </td>
                            <td data-label="price">{{$rentalbike->price}} $</td>
                            <td data-label="{!! trans('home.User_information') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>Name:</td><td>{{$rentalbike->user->name}}</td>
                                        </tr>
                                        <tr>
                                        <td>Email:</td><td>{{$rentalbike->user->email}}</td>
                                        </tr>
                                        @if($rentalbike->user->phone)
                                        <tr>
                                        <td>{!! trans('home.Phone') !!}:</td><td>{{$rentalbike->user->phone}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                        <td>{!! trans('home.City') !!}:</td><td>{{$rentalbike->user->city}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Address') !!}:</td><td>{{$rentalbike->user->address}}</td>
                                        </tr>
                                       </table>" title="{!! trans('home.User_information') !!}" data-html="true" class="btn btn-info">{!! trans('home.User_information') !!}</a>
                            </td>
                            <td data-label="status">
                                @if($rentalbike->status == 0)
                                    <span>{!! trans('home.Confirm') !!}</span>
                                @elseif($rentalbike->status == 1)
                                    <span>{!! trans('home.Confirmed') !!}</span>
                                @elseif($rentalbike->status == 2)
                                    <span>{!! trans('home.Bike') !!} {!! trans('home.Delivered') !!}</span>
                                @elseif($rentalbike->status == 3)
                                    <span>{!! trans('home.Bike') !!} {!! trans('home.Returned') !!}</span>
                                @endif
                            </td>
                            <td data-label="action">
                                @if($rentalbike->status == 0)
                                    {!! Form::model($rentalbike, ['method' => 'PATCH', 'action' => ['RentalBikesController@update', $rentalbike->id] ]) !!}
                                    <input type="hidden" name="status" value="1">
                                    <div class="form-group">
                                        {!! Form::submit(Lang::get('home.Confirm'), ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @elseif($rentalbike->status == 1)
                                    @php($bike_picked_up = Lang::get('home.Bike') . ' ' . Lang::get('home.Picked_Up') )
                                    {!! Form::model($rentalbike, ['method' => 'PATCH', 'action' => ['RentalBikesController@update', $rentalbike->id] ]) !!}
                                    <input type="hidden" name="status" value="2">
                                    <div class="form-group">
                                        {!! Form::submit($bike_picked_up, ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @elseif($rentalbike->status == 2)
                                     @php($bike_returned = Lang::get('home.Bike') . ' ' . Lang::get('home.Returned') )
                                    {!! Form::model($rentalbike, ['method' => 'PATCH', 'action' => ['RentalBikesController@update', $rentalbike->id] ]) !!}
                                    <input type="hidden" name="status" value="3">
                                    <div class="form-group">
                                        {!! Form::submit($bike_returned, ['class' => 'btn btn-success']) !!}
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
        <h1>{!! trans('home.Not') !!} {!! trans('home.Reservations') !!} {!! trans('home.Bikes') !!}</h1>
    @endif
@stop
@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@stop