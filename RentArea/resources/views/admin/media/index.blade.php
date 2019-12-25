@extends('layouts.admin')
@section('content')
    @if(count($photos) > 0)
    <h1>{!! trans('home.Media') !!}</h1>
    <table class="table-responsive-design">
       <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">{!! trans('home.Name') !!}</th>
            <th scope="col">{!! trans('home.CREATED') !!}</th>
            <th scope="col">{!! trans('home.Action') !!}</th>
          </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
              <tr>
                <td data-label="ID">{{ $photo->id }}</td>
                <td data-label="{!! trans('home.Name') !!}"><img height="50" src="{{ $photo->file }}" alt=""></td>
                <td data-label="{!! trans('home.CREATED') !!}">{{ $photo->created_at ? $photo->created_at : 'No date' }}</td>
                <td data-label="{!! trans('home.Action') !!}">
                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediaController@destroy', $photo->id]]) !!}
                    @php($delete_image = Lang::get('home.Delete') . ' ' . Lang::get('home.Image') )
                    <div class="form-group">
                        {!! Form::submit($delete_image, ['class' => 'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
              </tr>
          @endforeach
        @endif
       </tbody>
     </table>
    @else
        <h1>No {!! trans('home.No_media') !!}</h1>
    @endif
@stop