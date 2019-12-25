@extends('layouts.admin')
@section('content')
    <h1>{!! trans('home.Edit') !!} {!! trans('home.User') !!}</h1>
    <div class="col-md-3">
        <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo['file'] : 'http://via.placeholder.com/200x200'}}" alt="">
    </div>
    <div class="col-md-9">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true] ) !!}
        <div class="form-group">
            {!! Form::label('name', Lang::get('home.Name_and_Surname')) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone', Lang::get('home.Phone')) !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city', Lang::get('home.City')) !!}
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address', Lang::get('home.Address')) !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', Lang::get('home.Role')) !!}
            {!! Form::select('role_id', [''=> 'Choose role'] + $roles, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', Lang::get('home.Status')) !!}
            {!! Form::select('is_active',array('1' => 'Active', '0' => 'Offline'), null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', Lang::get('home.Photo')) !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', Lang::get('home.Password')) !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        @php($update_user = Lang::get('home.Update') . ' ' . Lang::get('home.User') ) 
        @php($delete_user = Lang::get('home.Delete') . ' ' . Lang::get('home.User') ) 
        <div class="form-group">
            {!! Form::submit($update_user, ['class' => 'btn btn-primary']) !!}
        </div>
        @include('includes.form-errors')
        {!! Form::close() !!}
        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
        <div class="form-group">
            {!! Form::submit($delete_user, ['class' => 'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop