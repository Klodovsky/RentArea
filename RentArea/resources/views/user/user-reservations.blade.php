@extends('layouts.app')
@section('content')
    <div class="container user-information-section">
        <div class="row">
            <div class="col-md-3">
                <ul id="nav-tabs-wrapper" class="nav nav-pills nav-stacked well menu-my-account">
                    <li><a href="{{route('user.user-profile')}}" title="">{!! trans('home.Overview') !!}</a></li>
                    <li><a href="{{route('user.user-edit')}}" title="">{!! trans('home.Profile') !!}</a></li>
                    <li class="active"><a href="{{route('user.user-reservations')}}" title="">{!! trans('home.Reservations') !!}</a></li>
                </ul>
                <br>
                <ul id="nav-tabs-wrapper" class="nav nav-pills nav-stacked well menu-my-account">
                    <li class="rent-now-btn"><a href="{{route('rent-a-car.search-car')}}">{!! trans('home.rent_a_car') !!}</a></li>
                </ul>
            </div>
            <div class="col-md-9">
            <div class="col-md-4">
                <img class="img-responsive img-rounded" src="{{Auth::user()->photo ? Auth::user()->photo['file'] : 'http://via.placeholder.com/200x200'}}" alt="">
            </div>
            <div class="col-md-8">
                <h1 class="name">{{Auth::user()->name}}</h1>
                @if(Auth::user()->email)
                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> {{Auth::user()->email}}</p>
                @endif
                @if(Auth::user()->phone)
                    <p><i class="fa fa-phone" aria-hidden="true"></i> {{Auth::user()->phone}}</p>
                @endif
                @if(Auth::user()->city || Auth::user()->address)
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{Auth::user()->city}}, {{Auth::user()->address}}</p>
                @endif
            </div>
            <div class="col-md-12">
                
             <h1 class="name margin-top40">{!! trans('home.Reservations') !!}</h1>
            @if($rentalcars)
        
                @foreach($rentalcars as $rentalcar)
                    @if($rentalcar->user_id == $user->id)
                    
                    <table class="table-responsive-design">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{!! trans('home.Car') !!}</th>
                            <th scope="col">{!! trans('home.DATES_LOCATIONS') !!}</th>
                            <th scope="col">{!! trans('home.PRICE') !!}</th>
                            <th scope="col">{!! trans('home.Status') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
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
                        <td data-label="{!! trans('home.Status') !!}">
                            @if($rentalcar->status == 0)
                                <span>{!! trans('home.Status1') !!}</span>
                            @elseif($rentalcar->status == 1)
                                <span>{!! trans('home.Status2') !!}</span>
                            @elseif($rentalcar->status == 2)
                                <span>{!! trans('home.Status3') !!}</span>
                            @elseif($rentalcar->status == 3)
                                <span>{!! trans('home.Status4') !!}</span>
                            @endif
                        </td>
                    </tr>
                    
                    </tbody>
                    </table>
                    @endif
                @endforeach
            @endif
            </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@stop