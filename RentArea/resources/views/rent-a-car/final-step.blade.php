@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="four steps steps1">
                    <li class="complete"></li>
                    <li class="complete"><a href="#">1</a><br><span class="stepstext">{!! trans('home.CHOOSE_CAR') !!}</span></li>
                    <li class="complete"><a href="#">2</a><br><span class="stepstext">{!! trans('home.ADDITIONAL_SERVICES') !!}</span></li>
                    <li class="complete"><a href="#">3</a><br><span class="stepstext steplast">{!! trans('home.FINISH') !!}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
    {!! Form::open(['method' => 'POST', 'action' => 'RentalCarsController@store','id'=>'final-step-form', 'files'=>true]) !!}
    @include('includes.form-errors')
    <input type="hidden" name="branch_pickup" value="{{$branch_pickup}}">
    <input type="hidden" name="branch_return" value="{{$branch_return}}">
    <input type="hidden" name="pickupDate" value="{{$pickupDate}}">
    <input type="hidden" name="returnDate" value="{{$returnDate}}">
    <input type="hidden" name="pickupTime" value="{{$pickupTime}}">
    <input type="hidden" name="returnTime" value="{{$returnTime}}">
    <input type="hidden" name="car_id" value="{{$car_id}}">
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
            @foreach($cars as $car)
                @if($car->id == $car_id)
                    @php ($total_price = $days * $car->price_per_day_car)
                    <h1 class="car-name">{{$car->type->name}} {{$car->name}} Rental</h1>
                    <p class="days"> {!! trans('home.Rent_for') !!} <strong>{{$days}}</strong> {!! trans('home.Day_s') !!} <strong class="pull-right">{{$days * $car->price_per_day_car}} $</strong></p>
                    @if($garantie == 1)
                        <p class="garantie-car">Warranty <span class="warranty-name">Limited</span> <span class="pull-right"> <b class="warranty-price">{{18 * $days}}</b> <b>$</b></span></p>
                    @elseif($garantie == 3)
                        <p class="garantie-car">Warranty <span class="warranty-name">No Coverage</span> <span class="pull-right"> <b class="warranty-price">0</b> <b>$</b></span></p>
                    @elseif($garantie == 2)
                        <p class="garantie-car">Warranty <span class="warranty-name">Relaxed</span> <span class="pull-right"> <b class="warranty-price">{{30 * $days}}</b> <b>$</b></span></p>
                    @endif
                    <p class="additional-car-services-title">{!! trans('home.ADDITIONAL_SERVICES') !!}</p>
                    <div id="fulloptions">
                        @if($car_gps)
                            @php($total_price += $car_gps)
                            <p>{!! trans('home.GPS') !!} x {{$days}} {!! trans('home.Day_s') !!}<strong class="pull-right">{{$car_gps}} $</strong></p>
                        @endif
                        @if($car_baby_chair)
                            @php($total_price += $car_baby_chair)
                            <p>{!! trans('home.CHILD_SEAT') !!} x {{$days}} {!! trans('home.Day_s') !!}<strong class="pull-right">{{$car_baby_chair}} $</strong></p>
                        @endif
                        @if($car_child_seat)
                            @php($total_price += $car_child_seat)
                            <p>{!! trans('home.BABY_CHAIR') !!} x {{$days}} {!! trans('home.Day_s') !!}<strong class="pull-right">{{$car_child_seat}} $</strong></p>
                        @endif
                        @if($car_wifi_price)
                            @php($total_price += $car_wifi_price)
                            <p>{!! trans('home.WI_FI_ROUTER') !!} x {{$days}} {!! trans('home.Day_s') !!}<strong class="pull-right">{{$car_wifi_price}} $</strong></p>
                        @endif
                        @if($car_snow_chains)
                            @php($total_price += $car_snow_chains)
                            <p>{!! trans('home.SNOW_CHAIN') !!} x {{$days}} {!! trans('home.Day_s') !!}<strong class="pull-right">{{$car_snow_chains}} $</strong></p>
                        @endif
                        @if($car_sky_support)
                            @php($total_price += $car_sky_support)
                            <p>{!! trans('home.SKY_SUPPORT') !!} x {{$days}} {!! trans('home.Day_s') !!}<strong class="pull-right">{{$car_sky_support}} $</strong></p>
                        @endif
                    <br>
                    <br>
                    </div>
                    <?php $dislocation = 0; ?>
                    @if($branch_return)
                        @if($branch_pickup != $branch_return)
                            <p>
                                Dislocation
                                <strong>
                                    @foreach($branches as $branch)
                                        @if($branch->id == $branch_pickup)
                                            {{$branch->name}}
                                        @endif
                                    @endforeach
                                    -
                                    @foreach($branches as $branch)
                                        @if($branch->id == $branch_return)
                                            {{$branch->name}}
                                        @endif
                                    @endforeach
                                </strong>
                                <strong class="pull-right">150 $</strong>
                            </p>
                            <?php  $dislocation = 150; ?>
                        @endif
                    @endif

                    <?php

                    $interval_start = strtotime('09:00');
                    $interval_end = strtotime('18:00');

                    $pickup_time = strtotime($pickupTime);
                    $return_time = strtotime($returnTime);

                    $over_time_pickup = 0;
                    $over_time_pickup_cond = 0;

                    $over_time_return = 0;
                    $over_time_return_cond = 0;

                    $over_time = 0;

                    if($interval_start <= $pickup_time && $pickup_time < $interval_end) {}
                    else { $over_time_pickup = 20; $over_time_pickup_cond = 1; }

                    if($interval_start <= $return_time && $return_time < $interval_end) {}
                    else { $over_time_return = 20; $over_time_return_cond = 1; }

                    $over_time = $over_time_pickup + $over_time_return;
                    ?>

                    @if($over_time_pickup_cond == 1 || $over_time_return_cond == 1)
                        <p>Program additional charges
                            <strong class="pull-right">{{$over_time}} $</strong>
                        </p>
                    @endif

                    <?php $garantie_total = 0; ?>
                    @if($garantie == 1)
                        <?php $garantie_total = 18 * $days ?>
                    @elseif($garantie == 3)
                        <?php $garantie_total = 0 ?>
                    @elseif($garantie == 2)
                        <?php $garantie_total = 30 * $days ?>
                    @endif


                    <br>
                    <br>

                    <h3 class="total">{!! trans('home.Total_price') !!}: <span class="pull-right">{{$total_price + $dislocation+$over_time+$garantie_total}}   $</span></h3>
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
                    <div class="form-group col-md-12">
                        {!! Form::label('flight_number', Lang::get('home.Flight_number')) !!}
                        {!! Form::text('flight_number', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::label('reservation_info', Lang::get('home.Reservation_info')) !!}
                        {!! Form::text('reservation_info', null, ['class' => 'form-control']) !!}
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
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label('password', Lang::get('home.Read_Agreed')) !!}
                    </div>
                </div>
                <div class="row">
                    <label class="checkboxes-final-form">
                    <div class="form-group col-md-12 checkbox-inline">
                        {!! Form::checkbox('terms_condition', null, null, ['class' => 'checkboxe-final-form']) !!}<span class="checkmark"></span>
                        {{ Lang::get('home.Terms_Conditions') }}
                    </div>
                    </label>
                </div>
                <div class="row">
                    <label class="checkboxes-final-form">
                        <div class="form-group col-md-12 checkbox-inline">
                            {!! Form::checkbox('personal_data', null, null, ['class' => 'checkboxe-final-form']) !!}<span class="checkmark"></span>
                            {{ Lang::get('home.Personal_Data_Policy') }}
                        </div>
                    </label>
                </div>
            @endif
                <div class="form-group text-left">
                    {!! Form::submit(Lang::get('home.Payment_on_pickup'), ['class' => 'btn btn-primary']) !!}
                </div>
        </div>
    </div>
    <div class="row car-details-row">
        <input type="hidden" name="price" value="{{$total_price + $dislocation + $over_time +$garantie_total}}">
    </div>
    {!! Form::close() !!}
    </div>
@stop