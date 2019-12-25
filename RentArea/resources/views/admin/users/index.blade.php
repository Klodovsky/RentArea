@extends('layouts.admin')

@section('content')

    <div id="yield-page" class="users-page">
        <h1>{!! trans('home.Users') !!}</h1>

        @if(Session::has('deleted_user'))
            <div class="alert alert-success" role="alert">
                <p>{{session('deleted_user')}}</p>
            </div>

        @elseif(Session::has('updated_user'))
            <div class="alert alert-success" role="alert">
                <p>{{session('updated_user')}}</p>
            </div>

        @elseif(Session::has('created_user'))
            <div class="alert alert-success" role="alert">
                <p>{{session('created_user')}}</p>
            </div>

        @endif

        <table class="table-responsive-design">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{!! trans('home.Photo') !!}</th>
                <th scope="col">{!! trans('home.Name_and_Surname') !!}</th>
                <th scope="col">Info</th>
                <th scope="col">{!! trans('home.Role') !!}</th>
                <th scope="col">{!! trans('home.Status') !!}</th>

            </tr>
            </thead>
            <tbody>

            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td data-label="ID">{{$user->id}}</td>
                        <td data-label="{!! trans('home.Photo') !!}"><img height="60" src="{{$user->photo ? $user->photo->file : 'http://via.placeholder.com/200x200'}}" alt=""></td>
                        <td data-label="{!! trans('home.Name_and_Surname') !!}"><a href="{{ route('admin.users.edit', $user->id) }}">{{$user->name}}</td></a>

                        <td data-label="Info" align="left" width="90%"><a data-toggle="popover" data-trigger="click" data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>Email:</td><td>{{$user->email}}</td>
                                       </tr>
                                        <tr>
                                        <td>{!! trans('home.Phone') !!}:</td><td>{{$user->phone}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.City') !!}:</td><td>{{$user->city}}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('home.Address') !!}:</td><td>{{$user->address}}</td>
                                       </tr>
                                       </table>" title="Characteristics" data-html="true" class="btn btn-info">Info</a>
                        </td>
                        <td data-label="{!! trans('home.Role') !!}">{{$user->role ? $user->role->name : 'User has no role'}}</td>
                        <td data-label="{!! trans('home.Status') !!}">{{$user->is_active ? "Active" : "Offline"}}</td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>

@stop

@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>

    <script>
        if($('#yield-page').hasClass('user-page')) {
            $('.cd-side-nav > ul > .users').addClass('active');
        }
        /* in loc de user-page poti sa pui current-page */
    </script>
@stop