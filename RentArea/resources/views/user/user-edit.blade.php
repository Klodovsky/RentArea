@extends('layouts.app')
@section('content')
    <div class="container user-information-section">
        <div class="row">
            <div class="col-md-3">
                <ul id="nav-tabs-wrapper" class="nav nav-pills nav-stacked well menu-my-account">
                    <li><a href="{{route('user.user-profile')}}" title="">{!! trans('home.Overview') !!}</a></li>
                    <li  class="active"><a href="{{route('user.user-edit')}}" title="">{!! trans('home.Profile') !!}</a></li>
                    <li><a href="{{route('user.user-reservations')}}" title="">{!! trans('home.Reservations') !!}</a></li>
                </ul>
                <br>
                <ul id="nav-tabs-wrapper" class="nav nav-pills nav-stacked well menu-my-account">
                    <li class="rent-now-btn"><a href="{{route('rent-a-car.search-car')}}">{!! trans('home.rent_a_car') !!}</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
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
                </div>
                {!! Form::model($user, ['method' => 'POST', 'action' => ['RentalCarsController@user_update', $user->id], 'id' => 'user_update_form', 'files' => true] ) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', Lang::get('home.Phone')) !!}
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', Lang::get('home.City')) !!}
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', Lang::get('home.Address')) !!}
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id', Lang::get('home.Photo')) !!}
                    {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit(Lang::get('home.Update_Profile'), ['class' => 'btn btn-primary']) !!}
                </div>
                @include('includes.form-errors')
                {!! Form::close() !!}
            </div>
        </div> {{-- row --}}
    </div> {{-- container --}}
@stop