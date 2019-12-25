<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <link href="{{asset('css/libs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/style.css')}}" rel="stylesheet">

</head>

<body>
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
                <img src="{{asset('/public/img/logo-black.png')}}" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo e(route('rent-a-car.search-car')); ?>"><i class="fa fa-car" aria-hidden="true"></i>
                             Rent a car</a></li>
                <li><a href="{{route('rent-a-bike.search-bike')}}"><i class="fa fa-bicycle" aria-hidden="true"></i>
                        Rent a bike</a></li>
                <li><a href="{{route('rent-a-moto.search-moto')}}"><i class="fa fa-motorcycle" aria-hidden="true"></i>
                        Rent a moto</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                @if(Auth::user()->role)
                                    @if(Auth::user()->role->name == 'client')
                                        <a href="{{ route('user.user-profile') }}">My profile</a>
                                    @endif
                                    @if(Auth::user()->role->name == 'administrator')
                                        <a href="{{ url('/admin/users') }}/{{auth()->user()->id}}/edit">My profile</a>
                                    @endif
                                @endif
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
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

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            @yield('content')

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>

</body>

</html>
