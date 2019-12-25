@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="four steps steps1">
                    <li class="complete"></li>
                    <li class="complete"><a href="#">1</a><br><span class="stepstext">{!! trans('home.CHOOSE_DATE') !!}</span></li>
                    <li class="complete"><a href="#">2</a><br><span class="stepstext">{!! trans('home.MOTO') !!}</span></li>
                    <li class="complete"><a href="#">3</a><br><span class="stepstext steplast">{!! trans('home.FINISH') !!}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        {!! Form::open(['method' => 'POST', 'action' => 'RentalMotoController@store','id'=>'final-step-form', 'files'=>true]) !!}
        @include('includes.form-errors')
        <input type="hidden" name="branch_pickup" value="{{$branch_pickup}}">
        <input type="hidden" name="branch_return" value="{{$branch_return}}">
        <input type="hidden" name="pickupDate" value="{{$pickupDate}}">
        <input type="hidden" name="returnDate" value="{{$returnDate}}">
        <input type="hidden" name="pickupTime" value="{{$pickupTime}}">
        <input type="hidden" name="returnTime" value="{{$returnTime}}">
        <input type="hidden" name="moto_id" value="{{$moto_id}}">
        @php ($date1=date_create($pickupDate))
        @php ($date2=date_create($returnDate))
        @php ($diff=date_diff($date1,$date2))
        @php ($days=$diff->format("%a"))
        @if($days == 0)
            @php ( $days = 1 )
        @endif
        <div class="row car-details-row">
            <div class="col-md-6 car_details">
                <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.FINISH') !!}</button>
                @foreach($motos as $moto)
                    @if($moto->id == $moto_id)
                        @php ($total_price = $days * $moto->price_per_day)
                        <h1 class="car-name">{{$moto->type}} {{$moto->name}}</h1>
                        <p class="days"> {!! trans('home.Rent_for') !!} <strong>{{$days}}</strong> {!! trans('home.Day_s') !!} <strong class="pull-right">{{$days * $moto->price_per_day}} $</strong></p>
                        <br>
                        <br>
                        <h3 class="total">{!! trans('home.Total_price') !!}: <span class="pull-right">{{$total_price}} $</span></h3>
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 user_details">
                <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.Personal_Data') !!}</button>
                    @if(Auth::user())
                        <p>{!! trans('home.Name_and_Surname') !!}: {{Auth::user()->name}}</p>
                        @if(Auth::user()->address)
                            <p>{!! trans('home.Address') !!}:  {{Auth::user()->address}}</p>
                        @endif
                        @if(Auth::user()->phone)
                            <p>{!! trans('home.Phone') !!}:  {{Auth::user()->phone}}</p>
                        @endif
                        @if(Auth::user()->email)
                            <p>Email:  {{Auth::user()->email}}</p>
                        @endif
                    @else
                   <div class="row">
                        <div class="form-group col-md-6">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {!! Form::label('city', Lang::get('home.City')) !!}
                            {!! Form::text('city', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('phone', Lang::get('home.Phone')) !!}
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {!! Form::label('password', Lang::get('home.Password')) !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('password_confirmation', Lang::get('home.Password_Confirm')) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                @endif
                    <div class="form-group text-left">
                        {!! Form::submit(Lang::get('home.Payment_on_pickup'), ['class' => 'btn btn-primary']) !!}
                    </div>
            </div>
        </div>
        <input type="hidden" name="price" value="{{$total_price}}">
        {!! Form::close() !!}
    </div>
@stop