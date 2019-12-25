@extends('layouts.admin')

@section('content')

    @if(($comments))

        <h1>Comments</h1>

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

            @if($comments)
                @foreach($comments as $comment)
                    <tr>
                        <td data-label="ID">{{$comment->id}}</td>
                        <td data-label="Author">{{$comment->author}}</td>
                        <td data-label="Email">{{$comment->email}}</td>
                        <td data-label="Body">{{$comment->body}}</td>
                        <td data-label="View post"><a href="{{ route('home.post',$comment->post->id) }}">View post</a></td>
                        <td data-label="Status">


                            @if($comment->is_active == 1)

                                {!! Form::model($comment, ['method' => 'PATCH', 'action' => ['PostsCommentsController@update', $comment->id] ]) !!}

                                <input type="hidden" name="is_active" value="0">

                                <div class="form-group">
                                    {!! Form::submit('Un-aprove', ['class' => 'btn btn-danger']) !!}
                                </div>

                                {!! Form::close() !!}

                            @else

                                {!! Form::model( $comment, ['method' => 'PATCH', 'action' => ['PostsCommentsController@update', $comment->id] ]) !!}

                                <input type="hidden" name="is_active" value="1">

                                <div class="form-group">
                                    {!! Form::submit('Aprove', ['class' => 'btn btn-success']) !!}
                                </div>

                                {!! Form::close() !!}

                            @endif

                        </td>

                        <td data-label="Action">

                            {!! Form::open(['method' => 'DELETE', 'action' => ['PostsCommentsController@destroy' , $comment->id] ]) !!}

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