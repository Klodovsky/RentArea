@extends('layouts.admin')
@section('content')
    @if(count($rentalmotos) > 0)
        <h1>{!! trans('home.Rental') !!} {!! trans('home.Motos') !!}</h1>
        <div class="col-md-12">
            <table class="table-responsive-design">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{!! trans('home.Moto') !!}</th>
                    <th scope="col">{!! trans('home.DATES_LOCATIONS') !!}</th>
                    <th scope="col">{!! trans('home.PRICE') !!}</th>
                    <th scope="col">{!! trans('home.User_information') !!}</th>
                    <th scope="col">{!! trans('home.Status') !!}</th>
                    <th scope="col">{!! trans('home.Action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @if($rentalmotos)
                    @foreach($rentalmotos as $rentalmoto)
                        <tr>
                            <td data-label="ID">{{$rentalmoto->id}}</td>
                            <td data-label="{!! trans('home.moto') !!}">{{$rentalmoto->moto->name}}</td>
                            <td data-label="{!! trans('home.DATES_LOCATIONS') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('home.Pickup_Location') !!}:</td><td>{{$rentalmoto->pickupConfiguration->location}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Location') !!}:</td><td>{{$rentalmoto->returnConfiguration ? $rentalmoto->returnConfiguration->location : $rentalmoto->pickupConfiguration->location}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Pickup_Date') !!}:</td><td>{{$rentalmoto->pickupDate}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Date') !!}:</td><td>{{$rentalmoto->returnDate}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Pickup_Time') !!}:</td><td>{{$rentalmoto->pickupTime}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Return_Time') !!}:</td><td>{{$rentalmoto->returnTime}}</td>
                                        </tr>
                                       </table>" title="{!! trans('home.DATES_LOCATIONS') !!}" data-html="true" class="btn btn-info">{!! trans('home.DATES_LOCATIONS') !!}</a>
                            </td>
                            <td data-label="price">{{$rentalmoto->price}} $</td>
                            <td data-label="{!! trans('home.User_information') !!}" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>Name:</td><td>{{$rentalmoto->user->name}}</td>
                                        </tr>
                                        <tr>
                                        <td>Email:</td><td>{{$rentalmoto->user->email}}</td>
                                        </tr>
                                        @if($rentalmoto->user->phone)
                                        <tr>
                                        <td>{!! trans('home.Phone') !!}:</td><td>{{$rentalmoto->user->phone}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                        <td>{!! trans('home.City') !!}:</td><td>{{$rentalmoto->user->city}}</td>
                                        </tr>
                                        <tr>
                                        <td>{!! trans('home.Address') !!}:</td><td>{{$rentalmoto->user->address}}</td>
                                        </tr>
                                       </table>" title="{!! trans('home.User_information') !!}" data-html="true" class="btn btn-info">{!! trans('home.User_information') !!}</a>
                            </td>
                            <td data-label="status">
                                @if($rentalmoto->status == 0)
                                    <span>{!! trans('home.Confirmed') !!}</span>
                                @elseif($rentalmoto->status == 1)
                                    <span>{!! trans('home.Confirmed') !!}</span>
                                @elseif($rentalmoto->status == 2)
                                    <span>{!! trans('home.Moto') !!} {!! trans('home.Delivered') !!}</span>
                                @elseif($rentalmoto->status == 3)
                                    <span>{!! trans('home.Moto') !!} {!! trans('home.Returned') !!}</span>
                                @endif
                            </td>
                            <td data-label="action">
                                @if($rentalmoto->status == 0)
                                    {!! Form::model($rentalmoto, ['method' => 'PATCH', 'action' => ['RentalMotoController@update', $rentalmoto->id] ]) !!}
                                    <input type="hidden" name="status" value="1">
                                    <div class="form-group">
                                        {!! Form::submit(Lang::get('home.Confirm'), ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @elseif($rentalmoto->status == 1)
                                    @php($moto_picked_up = Lang::get('home.Moto') . ' ' . Lang::get('home.Picked_Up') )
                                    {!! Form::model($rentalmoto, ['method' => 'PATCH', 'action' => ['RentalMotoController@update', $rentalmoto->id] ]) !!}
                                    <input type="hidden" name="status" value="2">
                                    <div class="form-group">
                                        {!! Form::submit($moto_picked_up, ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @elseif($rentalmoto->status == 2)
                                     @php($moto_returned = Lang::get('home.Moto') . ' ' . Lang::get('home.Returned') )
                                    {!! Form::model($rentalmoto, ['method' => 'PATCH', 'action' => ['RentalMotoController@update', $rentalmoto->id] ]) !!}
                                    <input type="hidden" name="status" value="3">
                                    <div class="form-group">
                                        {!! Form::submit($moto_returned, ['class' => 'btn btn-success']) !!}
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
        <h1>{!! trans('home.Not') !!} {!! trans('home.Reservations') !!} {!! trans('home.Motos') !!}</h1>
    @endif
@stop
@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@stop