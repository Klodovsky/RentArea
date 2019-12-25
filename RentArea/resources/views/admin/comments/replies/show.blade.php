@extends('layouts.admin')

@section('content')

    @if(($replies))

        <h1>Replies</h1>

        <table class="table-responsive-design">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">View post</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @if($replies)
                @foreach($replies as $reply)
                    <tr>
                        <td data-label="ID">{{$reply->id}}</td>
                        <td data-label="Author">{{$reply->author}}</td>
                        <td data-label="Email">{{$reply->email}}</td>
                        <td data-label="Body">{{$reply->body}}</td>
                        <td data-label="View post"><a href="{{ route('home.post',$reply->comment->post->id) }}">View post</a></td>
                        <td data-label="Status">


                            @if($reply->is_active == 1)

                                {!! Form::model($reply, ['method' => 'PATCH', 'action' => ['CommentsRepliesController@update', $reply->id] ]) !!}

                                <input type="hidden" name="is_active" value="0">

                                <div class="form-group">
                                    {!! Form::submit('Un-aprove', ['class' => 'btn btn-danger']) !!}
                                </div>

                                {!! Form::close() !!}

                            @else

                                {!! Form::model( $reply, ['method' => 'PATCH', 'action' => ['CommentsRepliesController@update', $reply->id] ]) !!}

                                <input type="hidden" name="is_active" value="1">

                                <div class="form-group">
                                    {!! Form::submit('Aprove', ['class' => 'btn btn-success']) !!}
                                </div>

                                {!! Form::close() !!}

                            @endif

                        </td>

                        <td data-label="Action">

                            {!! Form::open(['method' => 'DELETE', 'action' => ['CommentsRepliesController@destroy' , $reply->id] ]) !!}

                            <div class="form-group">
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            </div>

                            {!! Form::close() !!}

                        </td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

    @else
        <h1>No comments</h1>

    @endif

@stop