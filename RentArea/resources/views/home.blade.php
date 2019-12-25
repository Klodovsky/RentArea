@extends('layouts.app')

@section('content')
<div style="margin-top:50px" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('home.Dashboard') !!}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! trans('home.You_are_logged') !!} <br>
                    {!! trans('home.welcome') !!} {{Auth::user()->name}}. {!! trans('home.Go_to') !!}
                    @if(Auth::user()->role)
                        @if(Auth::user()->role->name == 'client')
                            <a style="color:#21aa48" href="{{ route('user.user-profile') }}">{!! trans('home.Profile') !!} / {!! trans('home.Dashboard') !!}  .</a>
                        @endif
                        @if(Auth::user()->role->name == 'author')
                            <a style="color:#21aa48" href="/admin/authors/{{ Auth::user()->id }}">{!! trans('home.Profile') !!} / {!! trans('home.Dashboard') !!}  .</a>
                        @endif
                        @if(Auth::user()->role->name == 'administrator')
                            <a style="color:#21aa48" href="{{ url('/admin/users') }}/{{auth()->user()->id}}/edit">{!! trans('home.Profile') !!} / {!! trans('home.Dashboard') !!}  .</a>
                        @endif
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
