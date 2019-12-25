@extends('layouts.app')
@section('content')
    <div style="margin-top:50px" class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if(Session::has('created_reservation_moto'))
                    <div class="alert alert-success" role="alert">
                        <p>{!! trans('home.completed_reservation1') !!}</p>
                        <p>{!! trans('home.Go_to') !!} <a href="{{route('user.user-reservations')}}"><strong>{!! trans('home.Your_Account') !!}</strong></a> {!! trans('home.completed_reservation2') !!}.</p>
                    </div>
                @else
                    <script>window.location = "/";</script>
                @endif
            </div>
        </div>
    </div>
@stop