@extends('layouts.admin')



@section('content')



    <h1>Edit User</h1>



    <div class="col-md-3">

        <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo['file'] : 'http://via.placeholder.com/200x200'}}" alt="">

    </div>



    <div class="col-md-9">



        {!! Form::model($user, ['method' => 'POST', 'action' => ['AdminUsersController@update_author', $user->id], 'files' => true] ) !!}



        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}

            {!! Form::text('name', null, ['class' => 'form-control']) !!}

        </div>



        <div class="form-group">

            {!! Form::label('email', 'Email:') !!}

            {!! Form::email('email', null, ['class' => 'form-control']) !!}

        </div>



        <div class="form-group">

            {!! Form::label('phone', 'Phone:') !!}

            {!! Form::text('phone', null, ['class' => 'form-control']) !!}

        </div>



        <div class="form-group">

            {!! Form::label('city', 'City:') !!}

            {!! Form::text('city', null, ['class' => 'form-control']) !!}

        </div>



        <div class="form-group">

            {!! Form::label('address', 'Address:') !!}

            {!! Form::text('address', null, ['class' => 'form-control']) !!}

        </div>



        <input type="text" class="hidden" name="role_id" value="{{$user->role->id}}">





        <div class="form-group">

            {!! Form::label('is_active', 'Status:') !!}

            {!! Form::select('is_active',array('1' => 'Active', '0' => 'Offline'), null, ['class' => 'form-control']) !!}

        </div>



        <div class="form-group">

            {!! Form::label('photo_id', 'Photo:') !!}

            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}

        </div>



        <div class="form-group">

            {!! Form::label('password', 'Password:') !!}

            {!! Form::password('password', ['class' => 'form-control']) !!}

        </div>



   <!--      <div class="form-group">

            {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}

        </div> -->



        @include('includes.form-errors')



        {!! Form::close() !!}



        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}



        <div class="form-group">

            {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}

        </div>



        {!! Form::close() !!}



    </div>



@stop