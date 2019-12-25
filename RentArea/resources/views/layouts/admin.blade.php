<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

    <link href="{{asset('css/libs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/style.css')}}" rel="stylesheet">

    <title>RentArea</title>
    <link rel="icon" href="{{asset('public/img/favicon.ico')}}" type="image/ico" sizes="16x16">

    @yield('styles')
</head>
<body>
    <header class="cd-main-header">
        <a href="{{ url('/') }}" class="cd-logo"><img src="{{asset('public/img/logo.png')}}" align="top"  alt="Logo" ></a>

        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        <nav class="cd-nav">
            <ul class="cd-top-nav">

                @if(auth()->guest())
                    @if(!Request::is('auth/login'))
                        <li><a href="{{ url('/auth/login') }}">{!! trans('home.login') !!}</a></li>
                    @endif
                    @if(!Request::is('auth/register'))
                        <li><a href="{{ url('/auth/register') }}">{!! trans('home.register') !!}</a></li>
                    @endif
                @else

                    <!-- <li><a href="#">{!! trans('home.english') !!}</a></li>!-->
                   <!-- <li><a href="#">{!! trans('home.german') !!}</a></li> !-->

                    <li class="has-children account">
                        <a href="#0">
                            <img src="{{Auth::user()->photo ? Auth::user()->photo->file : 'public/img/cd-avatar.png'}}" alt="avatar">
                            {{ auth()->user()->name }}
                        </a>
                        <ul>                     
                            @if(Auth::user()->role->name == 'administrator')
                                <li><a href="{{ url('/admin/users') }}/{{auth()->user()->id}}/edit">{!! trans('home.Profile') !!}</a></li>
                            @endif
                            @if(Auth::user()->role->name == 'author')
                                <a href="{{ url('/admin/authors') }}/{{auth()->user()->id}}">{!! trans('home.Profile') !!}</a>
                            @endif
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
        </nav>
    </header> <!-- .cd-main-header -->

    <main class="cd-main-content">
        <nav class="cd-side-nav">
            <ul>

                @if(Auth::user()->role->name == 'administrator')

                <li class="has-children users">
                    <a href="#0">{!! trans('home.Users') !!}</a>
                    <ul>
                        <li><a href="{{ route('admin.users.index') }}">{!! trans('home.All') !!} {!! trans('home.Users') !!}</a></li>
                        <li><a href="{{ route('admin.users.create') }}">{!! trans('home.Create') !!} {!! trans('home.Users') !!}</a> </li>
                    </ul>
                </li>
                @endif

                <li class="has-children bookmarks">
                    <a href="#0">{!! trans('home.Posts') !!}</a>
                    <ul>
                        <li><a href="{{ route('admin.posts.index') }}">{!! trans('home.All') !!} {!! trans('home.Posts') !!}</a></li>
                        <li><a href="{{ route('admin.posts.create') }}">{!! trans('home.Create') !!} {!! trans('home.Posts') !!}</a></li>
                        <li><a href="{{ route('admin.comments.index') }}">{!! trans('home.All') !!} {!! trans('home.Comments') !!}</a></li>
                        <li><a href="{{ route('admin.categories.index') }}">{!! trans('home.All') !!} {!! trans('home.Categories') !!}</a></li>
                    </ul>
                </li>

                <li class="has-children images">
                    <a href="#0">{!! trans('home.Media') !!}</a>
                    <ul>
                        <li><a href="{{ route('admin.media.index') }}">{!! trans('home.All') !!} {!! trans('home.Media') !!}</a> </li>
                        <li><a href="{{ route('admin.media.create') }}">{!! trans('home.Upload') !!} {!! trans('home.Media') !!}</a></li>
                    </ul>
                </li>

                @if(Auth::user()->role->name == 'administrator')

                <li class="overview"><a href="{{ route('cars.branches.index') }}">{!! trans('home.All') !!} {!! trans('home.Branches') !!}</a></li>

                <li class="has-children images">
                    <a href="#0">{!! trans('home.Cars') !!}</a>
                    <ul>
                        <li><a href="{{ route('cars.index') }}">{!! trans('home.All') !!} {!! trans('home.Cars') !!}</a></li>
                        <li><a href="{{ route('cars.create') }}">{!! trans('home.Create') !!} {!! trans('home.Car') !!}</a></li>
                    </ul>
                </li>

                <li class="has-children images">
                    <a href="#0">{!! trans('home.Car') !!} {!! trans('home.Characteristics') !!}</a>
                    <ul>
                        <li><a href="{{ route('cars.types.index') }}">{!! trans('home.All') !!} {!! trans('home.Types') !!}</a></li>
                        <li><a href="{{ route('cars.fuels.index') }}">{!! trans('home.All') !!} {!! trans('home.Types_of_fuel') !!}</a></li>
                        <li><a href="{{ route('cars.gearboxes.index') }}">{!! trans('home.All') !!} {!! trans('home.Gearboxes') !!}</a></li>
                    </ul>
                </li>

                <li class="has-children bookmarks">
                    <a href="#0">{!! trans('home.Car') !!} {!! trans('home.Reservations') !!}</a>
                    <ul>
                        <li><a href="{{ route('rent-a-car.show') }}">{!! trans('home.All') !!} {!! trans('home.Reservations') !!}</a></li>
                        <li><a href="{{ route('rent-a-car.search-car') }}">{!! trans('home.Create') !!} {!! trans('home.Reservations') !!}</a></li>
                    </ul>
                </li>

                <li class="has-children images">
                    <a href="#0">{!! trans('home.Bikes') !!}</a>
                    <ul>
                        <li><a href="{{ route('bikes.index') }}">{!! trans('home.All') !!} {!! trans('home.Bikes') !!}</a></li>
                        <li><a href="{{ route('bikes.create') }}">{!! trans('home.Create') !!} {!! trans('home.Bikes') !!}</a></li>
                    </ul>
                </li>

                <li class="has-children bookmarks">
                    <a href="#0">{!! trans('home.Bike') !!} {!! trans('home.Reservations') !!}</a>
                    <ul>
                        <li><a href="{{ route('rent-a-bike.show') }}">{!! trans('home.All') !!} {!! trans('home.Reservations') !!}</a></li>
                        <li><a href="{{ route('rent-a-bike.search-bike') }}">{!! trans('home.Create') !!} {!! trans('home.Reservations') !!}</a></li>
                    </ul>
                </li>

                <li class="has-children images">
                    <a href="#0">{!! trans('home.Moto') !!}</a>
                    <ul>
                        <li><a href="{{ route('motos.index') }}">{!! trans('home.All') !!} {!! trans('home.Motos') !!}</a></li>
                        <li><a href="{{ route('motos.create') }}">{!! trans('home.Create') !!} {!! trans('home.Moto') !!}</a></li>
                    </ul>
                </li>

                <li class="has-children bookmarks">
                    <a href="#0">{!! trans('home.Moto') !!} {!! trans('home.Reservations') !!}</a>
                    <ul>
                        <li><a href="{{ route('rent-a-moto.show') }}">{!! trans('home.All') !!} {!! trans('home.Reservations') !!}</a></li>
                        <li><a href="{{ route('rent-a-moto.search-moto') }}">{!! trans('home.Create') !!} {!! trans('home.Reservations') !!}</a></li>
                    </ul>
                </li>

                 @endif

                @if(Auth::user()->role->name == 'author')
                        <li class="has-children bookmarks">
                            <a href="{{ route('rent-a-car.search-car') }}">{!! trans('home.Create') !!} {!! trans('home.Car') !!} {!! trans('home.Reservations') !!}</a>
                        </li>
                        <li class="has-children bookmarks">
                            <a href="{{ route('rent-a-bike.search-bike') }}">{!! trans('home.Create') !!} {!! trans('home.Bike') !!} {!! trans('home.Reservations') !!}</a>
                        </li>
                        <li class="has-children bookmarks">
                            <a href="{{ route('rent-a-moto.search-moto') }}">{!! trans('home.Create') !!} {!! trans('home.Moto') !!} {!! trans('home.Reservations') !!}</a>
                        </li>
                @endif

            </ul>
        </nav>

        <div class="content-wrapper">
            @yield('content')
        </div> <!-- .content-wrapper -->
    </main> <!-- .cd-main-content -->

    <script src="{{asset('js/libs.js')}}"></script>

    @yield('footer')

</body>
</html>