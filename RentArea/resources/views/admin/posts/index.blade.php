@extends('layouts.admin')
@section('content')
    @if(count($posts) > 0)
    <h1>{!! trans('home.Posts') !!}</h1>
    <table class="table-responsive-design">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{!! trans('home.Photo') !!}</th>
            <th scope="col">{!! trans('home.OWNER') !!}</th>
            <th scope="col">{!! trans('home.TITLE') !!}</th>
            <th scope="col">{!! trans('home.Category') !!}</th>
            <th scope="col">{!! trans('home.BODY') !!}</th>
            <th scope="col">{!! trans('home.CREATED') !!}</th>
            <th scope="col">{!! trans('home.UPDATED') !!}</th>
            <th scope="col">{!! trans('home.VIEW_POST') !!}</th>
            <th scope="col">{!! trans('home.VIEW_COMMENTS') !!}</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td data-label="ID">{{$post->id}}</td>
                    <td data-label="{!! trans('home.Photo') !!}"><img height="50" src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/200x200'}}" alt=""></td>
                    <td data-label="{!! trans('home.OWNER') !!}">{{$post->user->name}}</td>
                    <td data-label="{!! trans('home.TITLE') !!}"><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td data-label="{!! trans('home.Category') !!}">{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td data-label="{!! trans('home.BODY') !!}">{{str_limit($post->body,6)}}</td>
                    <td data-label="{!! trans('home.CREATED') !!}">{{$post->created_at->diffForHumans()}}</td>
                    <td data-label="{!! trans('home.UPDATED') !!}">{{$post->updated_at->diffForHumans()}}</td>
                    <td data-label="{!! trans('home.VIEW_POST') !!}"><a href="{{ route('home.post', $post->slug) }}">{!! trans('home.VIEW_POST') !!}</a></td>
                    <td data-label="{!! trans('home.VIEW_COMMENTS') !!}"><a href="{{ route('admin.comments.show', $post->id) }}">{!! trans('home.VIEW_COMMENTS') !!}</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12 text-center">{{ $posts->render() }}</div>
    </div>
    @else
        <h1>No Posts</h1>
    @endif
@stop