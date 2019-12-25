<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RentArea</title>
    <link rel="icon" href="{{asset('public/img/favicon.ico')}}" type="image/ico" sizes="16x16">
    <!-- Styles -->
    <link href="{{asset('css/libs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/style.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="rent-zone-nav navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('public/img/logo-black.png')}}" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('rent-a-car.search-car')}}">{!! trans('home.rent_a_car_menu') !!}</a></li>
                    <li><a href="{{route('rent-a-bike.search-bike')}}"> {!! trans('home.rent_a_bike_menu') !!}</a></li>
                    <li><a href="{{route('rent-a-moto.search-moto')}}"> {!! trans('home.rent_a_moto_menu') !!}</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}"> {!! trans('home.login') !!}</a></li>
                        <li><a href="{{ route('register') }}"> {!! trans('home.register') !!}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    @if(Auth::user()->role)
                                        @if(Auth::user()->role->name == 'client')
                                            <a href="{{ route('user.user-profile') }}">{!! trans('home.My_Profile') !!}</a>
                                        @endif
                                        @if(Auth::user()->role->name == 'author')
                                            <a href="{{ url('/admin/authors') }}/{{Auth::user()->id}}">{!! trans('home.My_Profile') !!}</a>
                                        @endif
                                        @if(Auth::user()->role->name == 'administrator')
                                            <a href="{{ url('/admin/users') }}/{{Auth::user()->id}}/edit">{!! trans('home.My_Profile') !!}</a>
                                        @endif
                                    @endif
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {!! trans('home.logout') !!}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                   
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="band pawb">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <ul class="nav nav-justified nopadding">
                        <li>
                            <div class="sliderbuttons nopadding">
                                <i class="fa fa-check bbb" aria-hidden="true"></i> {!! trans('home.new_vehicles') !!}
                            </div>
                        </li>
                        <li>
                            <div class="sliderbuttons nopadding" href="#">
                                <i class="fa fa-check bbb" aria-hidden="true"></i> {!! trans('home.city_free_delivery') !!}
                            </div>
                        </li>
                        <li>
                            <div class="sliderbuttons nopadding" href="#">
                                <i class="fa fa-check bbb" aria-hidden="true"></i> {!! trans('home.reservation_and_road_assistance') !!}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container why-us">
        <h1 class="homepagetitle text-center">{!! trans('home.why_choose_us') !!}</h1>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> {!! trans('home.outstanding_services') !!}</h4>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas lobortis vestibulum ipsum vitae pellentesque.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> {!! trans('home.quality_vehicles') !!}</h4>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas lobortis vestibulum ipsum vitae pellentesque.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> {!! trans('home.gps_every_vehicle') !!}</h4>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas lobortis vestibulum ipsum vitae pellentesque.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-child" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> {!! trans('home.Baby_Chairs_Booster_Seats') !!}</h4>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas lobortis vestibulum ipsum vitae pellentesque.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> {!! trans('home.AT_MT_Transmission') !!}</h4>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas lobortis vestibulum ipsum vitae pellentesque.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> {!! trans('home.24_Hours_Support') !!}</h4>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas lobortis vestibulum ipsum vitae pellentesque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer id="footer-main">
    <div class="container">
        <div class="col-md-3">
            <h6>{!! trans('home.ABOUT') !!} <span>RentArea</span></h6>
            <div class="text">
                <p>Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maece nas lobortis vestibulum ipsum.</p>
            </div>
        </div>
        <div class="col-md-3">
            <h6>{!! trans('home.CONTACT') !!}</h6>
            <div class="text">
                <p><span>Rentarea {!! trans('home.office') !!} 1:</span> (323) 938-5798</p>
                <p><span>Rentarea {!! trans('home.office') !!} 2:</span> (888) 637-7262</p>
                <p><span>Email:</span> <a href="mailto:rent@zone.com">contact@rentarea.com</a></p>
            </div>
        </div>
        <div class="col-md-3">
            <h6>{!! trans('home.SERVICE_HOURS') !!}</h6>
            <div class="text">
                <p><span>{!! trans('home.monday') !!} - {!! trans('home.Friday') !!}:</span> 09:00 - 22:00</p>
                <p><span>{!! trans('home.Saturday') !!}:</span> 09:00 - 20:00</p>
                <p><span>{!! trans('home.Sunday') !!}:</span> 09:00 - 12:00</a></p>
            </div>
        </div>
        <div class="col-md-3">
            <h6>{!! trans('home.SOCIAL_NETWORK') !!}</h6>
            <div class="socials_wrapper">
                <ul class="socials_lists">
                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li> <a href="#" target="_blank"> <i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('public/js/libs/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('public/js/libs/bootstrap.min.js') }}"></script>
@yield('footer')
</body>
</html>
