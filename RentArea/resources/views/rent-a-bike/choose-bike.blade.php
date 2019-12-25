@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="four steps steps1">
                    <li class="complete"></li>
                    <li class="complete"><a href="#">1</a><br><span class="stepstext">{!! trans('home.CHOOSE_DATE') !!}</span></li>
                    <li class="complete text-center"><a href="#">2</a><br><span class="stepstext">{!! trans('home.CHOOSE_BIKE') !!}</span></li>
                    <li><a href="#">3</a><br><span class="stepstext steplast">{!! trans('home.FINISH') !!}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            {!! Form::open(['method' => 'GET', 'action' => 'RentalBikesController@final_step','id'=>'car-rental-form', 'files'=>true]) !!}

            <div class="col-md-12">
                <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.Choose_Bike_in') !!}
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
                @foreach($bikes as $bike)
                    @if($bike->branch->id == $branch_pickup && $bike->is_available == 1)
                        <div class="rental_item col-lg-4 col-md-6">
                            <div class="wrap_img">
                                <div class="relative">
                                    <img class="featured" height="150" src="{{$bike->photo->file}}" alt="">
                                    <div class="flex-zone">
                                        <div class="flex-zone-inside">
                                            <a class="button-rent-it">{!! trans('home.SELECT_BIKE') !!}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="wrap_btn">
                                        <a href="#" class="btn_price">
                                            <span class="wrap_content"><span class="amount"><span price="{{$bike->price_per_day}}" class="price-amount"><span class="currencySymbol">$</span>{{$bike->price_per_day}}</span></span><span class="time">/ {!! trans('home.Day') !!} </span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <h3  name="{{$bike->id}}" class="title name">{{$bike->name}}</h3>
                                <div class="car-type"><span>{{$bike->type}}</span></div>
                                <div class="features">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @if($bike->bike_for)
                                                <div class="feature-item odd"> <img src="{{asset('public/img/icons/man.png')}}" alt=""><span>{{$bike->bike_for}}</span></div>
                                            @endif
                                            @if($bike->max_weight)
                                                <div class="feature-item eve"> <img src="{{asset('public/img/icons/weighing-scale.png')}}" alt=""><span>{{$bike->max_weight}}</span></div>
                                            @endif
                                            @if($bike->wheel_size)
                                                <div class="feature-item odd"> <img src="{{asset('public/img/icons/bike-wheel-size.png')}}" alt=""><span>{{$bike->wheel_size}}</span></div>
                                            @endif
                                            @if($bike->frame_size)
                                                <div class="feature-item eve"> <img src="{{asset('public/img/icons/bicycle-frame-size.png')}}" alt=""><span>{{$bike->frame_size}}</span></div>
                                            @endif
                                            @if($bike->chain)
                                                <div class="feature-item odd"> <img src="{{asset('public/img/icons/bike-chain.png')}}" alt=""><span>{{$bike->chain}}</span></div>
                                            @endif
                                            @if($bike->handlebar_width)
                                                <div class="feature-item eve"> <img src="{{asset('public/img/icons/handlebar-width.png')}}" alt=""><span>{{$bike->handlebar_width}}</span></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <input class="bike-id required" type="hidden" name="bike_id" value="">

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
            /* parseaza bike id si price*/
            $('.vehicles .rental_item').on('click', function(){

                var name = $('.name', this ).attr('name');
                $('.bike-id' ).attr( "value", name );

                $('.vehicles .rental_item .flex-zone' ).removeClass( "active");
                $('.vehicles .rental_item .flex-zone .button-rent-it' ).text( '<?php echo __('home.SELECT_BIKE') ?>');

                $('.flex-zone',this ).addClass( "active");
                $('.flex-zone .button-rent-it',this ).text('<?php echo __('home.SELECTED') ?>');
            });
        });
    </script>


@stop