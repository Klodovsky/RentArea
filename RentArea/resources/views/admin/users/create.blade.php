@extends('layouts.admin')
@section('content')
    <h1>{!! trans('home.Create') !!} {!! trans('home.User') !!}</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true] ) !!}
    <div class="row">
    <div class="col-md-6">   
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
    </div>
    <div class="col-md-6">   
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
        {!! Form::select('is_active',array('1' => 'Active', '0' => 'Offline'), 0, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', Lang::get('home.Photo')) !!}
        {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', Lang::get('home.Password')) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    @php($create_user = Lang::get('home.Create') . ' ' . Lang::get('home.User') )
    <div class="form-group">
        {!! Form::submit($create_user, ['class' => 'btn btn-primary']) !!}
    </div>
    </div>
    </div>
 
    @include('includes.form-errors')
    {!! Form::close() !!}
@stop