@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="four steps steps1">
                    <li class="complete"></li>
                    <li class="complete"><a href="#">1</a><br><span class="stepstext">{!! trans('home.CHOOSE_DATE') !!}</span></li>
                    <li class="complete text-center"><a href="#">2</a><br><span class="stepstext">{!! trans('home.CHOOSE_MOTO') !!}</span></li>
                    <li><a href="#">3</a><br><span class="stepstext steplast">{!! trans('home.FINISH') !!}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            {!! Form::open(['method' => 'GET', 'action' => 'RentalMotoController@final_step','id'=>'car-rental-form', 'files'=>true]) !!}

            <div class="col-md-12">
                <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.Choose_Moto_in') !!} 
                @foreach($branches as $branch)
                    @if($branch->id == $branch_pickup)
                        {{$branch->name}}
                    @endif
                @endforeach
                </button>
            </div>

            <div class="col-md-12">
                @include('includes.form-errors')
            </div>

            <input type="hidden" name="branch_pickup" value="{{$branch_pickup}}">
            <input type="hidden" name="branch_return" value="{{$branch_return}}">
            <input type="hidden" name="pickupDate" value="{{$pickupDate}}">
            <input type="hidden" name="returnDate" value="{{$returnDate}}">
            <input type="hidden" name="pickupTime" value="{{$pickupTime}}">
            <input type="hidden" name="returnTime" value="{{$returnTime}}">

            @php ($date1=date_create($pickupDate))
            @php ($date2=date_create($returnDate))
            @php ($diff=date_diff($date1,$date2))
            @php ($result=$diff->format("%a"))


            <div class="vehicles">
                @foreach($motos as $moto)
                    @if($moto->branch->id == $branch_pickup && $moto->is_available == 1)
                        <div class="rental_item col-lg-4 col-md-6">
                            <div class="wrap_img">
                                <div class="relative">
                                    <img class="featured" height="150" src="{{$moto->photo->file}}" alt="">
                                    <div class="flex-zone">
                                        <div class="flex-zone-inside">
                                            <a class="button-rent-it">{!! trans('home.SELECT_MOTO') !!}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="wrap_btn">
                                        <a href="#" class="btn_price">
                                            <span class="wrap_content"><span class="amount"><span price="{{$moto->price_per_day}}" class="price-amount"><span class="currencySymbol">$</span>{{$moto->price_per_day}}</span></span><span class="time">/ Day </span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <h3  name="{{$moto->id}}" class="title name">{{$moto->name}}</h3>
                                <div class="car-type"><span>{{$moto->type}}</span></div>
                                <div class="features">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @if($moto->max_weight)
                                                <div class="feature-item odd"> <img src="{{asset('public/img/icons/weighing-scale.png')}}" alt=""><span>{{$moto->max_weight}}</span></div>
                                            @endif
                                            @if($moto->max_speed)
                                                <div class="feature-item eve"> <img src="{{asset('public/img/icons/max-speed.png')}}" alt=""><span>{{$moto->max_speed}}</span></div>
                                            @endif
                                            @if($moto->fuel_economy)
                                                <div class="feature-item odd"> <img src="{{asset('public/img/icons/gas-pump.png')}}" alt=""><span>{{$moto->fuel_economy}}</span></div>
                                            @endif
                                            @if($moto->engine)
                                                <div class="feature-item eve"> <img src="{{asset('public/img/icons/motor.png')}}" alt=""><span>{{$moto->engine}}</span></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <input class="moto-id required" type="hidden" name="moto_id" value="">

            <input type="hidden" name="status" value="0">

            <div id="next-step" class="col-md-12">
                <div class="form-group">
                    {!! Form::submit(Lang::get('home.Next_step'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            <p class="text"></p>
            <p class="total"></p>

            <div class="clearfix"></div>

            {!! Form::close() !!}

        </div>
    </div> {{-- container --}}

@stop

@section('footer')

    <script>
        $(function() {
            /* parseaza car id si price*/
            $('.vehicles .rental_item').on('click', function(){

                var name = $('.name', this ).attr('name');
                $('.moto-id' ).attr( "value", name );

                $('.vehicles .rental_item .flex-zone' ).removeClass( "active");
                $('.vehicles .rental_item .flex-zone .button-rent-it' ).text('<?php echo __('home.SELECT_MOTO') ?>');

                $('.flex-zone',this ).addClass( "active");
                $('.flex-zone .button-rent-it',this ).text('<?php echo __('home.SELECTED') ?>');
            });
        });
    </script>


@stop