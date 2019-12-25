@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
        <h1>Add {!! trans('home.Category') !!}</h1>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        @php($create_category = Lang::get('home.Create') . ' ' . Lang::get('home.Category') )
        <div class="form-group">
            {!! Form::submit($create_category, ['class' => 'btn btn-primary']) !!}
        </div>
        @include('includes.form-errors')
        {!! Form::close() !!}
    </div>
    @if(count($categories) > 0)
        <div class="col-md-6">
            <h1>{!! trans('home.Categories') !!}</h1>
            <table class="table-responsive-design">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{!! trans('home.Name') !!}</th>
                    <th scope="col">{!! trans('home.CREATED') !!}</th>
                    <th scope="col">{!! trans('home.UPDATED') !!}</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td data-label="ID">{{$category->id}}</td>
                            <td data-label="{!! trans('home.Name_and_Surname') !!}"><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td data-label="{!! trans('home.CREATED') !!}">{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                            <td data-label="{!! trans('home.UPDATED') !!}">{{$category->updated_at ? $category->updated_at->diffForHumans() : 'no date'}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @else
        <div class="col-md-12">
            <h1>{!! trans('home.No_categories') !!}</h1>
        </div>
    @endif
@stop