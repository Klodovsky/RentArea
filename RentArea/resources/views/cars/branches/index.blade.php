@extends('layouts.admin')
@section('content')
    <div class="col-md-4">
        <h1>{!! trans('home.Create') !!} {!! trans('home.Branches') !!}</h1>
        {!! Form::open(['method' => 'POST', 'action' => 'CarBranchController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', Lang::get('home.Name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address', Lang::get('home.Address')) !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('location', Lang::get('home.Location')) !!}
            {!! Form::text('location', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone', Lang::get('home.Phone')) !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        </div>
        @php($create_branch = Lang::get('home.Create') . ' ' . Lang::get('home.Branch') )
        <div class="form-group">
            {!! Form::submit($create_branch, ['class' => 'btn btn-primary']) !!}
        </div>
        @include('includes.form-errors')
        {!! Form::close() !!}
    </div>
    @if(count($branches) > 0)
        <div class="col-md-8">
            <h1>{!! trans('home.Branches') !!}</h1>
            <table style="margin-bottom:50px" class="table-responsive-design">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{!! trans('home.Name') !!}</th>
                    <th scope="col">Email</th>
                    <th scope="col">Info</th>
                </tr>
                </thead>
                <tbody>
                @if($branches)
                    @foreach($branches as $branch)
                        <tr>
                            <td data-label="ID">{{$branch->id}}</td>
                            <td data-label="{!! trans('home.Name') !!}"><a href="{{route('cars.branches.edit', $branch->id)}}">{{$branch->name}}</a></td>
                            <td data-label="Email">{{$branch->email}}</td>
                            <td data-label="Info" align="left" width="90%"><a data-placement="bottom" data-toggle="popover" data-trigger="click"  data-content="<table class='table table-bordered'>
                               <tr>
                                <td>{!! trans('home.Address') !!}:</td><td>{{$branch->address}}</td>
                               </tr>
                               <tr>
                                <td>{!! trans('home.Location') !!}:</td><td>{{$branch->location}}</td>
                               </tr>
                               <tr>
                                <td>{!! trans('home.Phone') !!}:</td><td>{{$branch->phone}}</td>
                               </tr>
                               </table>" title="Characteristics" data-html="true" class="btn btn-info">Info</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @else
        <h1>{!! trans('home.Not') !!} {!! trans('home.Branches') !!}</h1>
    @endif
@stop
@section('footer')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@stop