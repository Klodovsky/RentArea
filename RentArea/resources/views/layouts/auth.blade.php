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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {!! trans('home.language') !!} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">{!! trans('home.english') !!}</a></li>
                            <li><a href="#">{!! trans('home.german') !!}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="auth-content">
        @yield('content')
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('footer')
</body>
</html>
