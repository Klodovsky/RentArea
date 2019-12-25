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
    <a href="{{ url('/') }}" class="cd-logo"><img src="{{asset('img/logo.png')}}" alt="Logo"></a>

    <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

    <nav class="cd-nav">
        <ul class="cd-top-nav">
            @if(auth()->guest())
                @if(!Request::is('auth/login'))
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                @endif
                @if(!Request::is('auth/register'))
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @endif
            @else
                <li class="has-children account">
                    <a href="#0">
                        <img src="{{Auth::user()->photo ? Auth::user()->photo->file : '/img/cd-avatar.png'}}" alt="avatar">
                        {{ auth()->user()->name }}
                    </a>
                    <ul>
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
                        <li><a href="{{ url('/admin/users') }}/{{auth()->user()->id}}/edit">Profile</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
</header> <!-- .cd-main-header -->

<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul>


            <li class="has-children bookmarks">
                <a href="#0">Posts</a>
                <ul>
                    <li><a href="{{ route('admin.posts.index') }}">All Posts</a></li>
                    <li><a href="{{ route('admin.posts.create') }}">Create Post</a></li>
                    <li><a href="{{ route('admin.comments.index') }}">All Comments</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">All Categories</a></li>
                </ul>
            </li>


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