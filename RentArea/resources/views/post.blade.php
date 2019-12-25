@extends('layouts.blog-post')

@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->name  }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->

    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/200x200'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{ $post->body }}</p>

    <hr>

    <!-- Blog Comments -->

    @if(Session::has('comment_message'))
        <div class="alert alert-success" role="alert">
            <p>{{session('comment_message')}}</p>
        </div>
    @endif

    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method' => 'POST', 'action' => 'PostsCommentsController@store']) !!}

        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="form-group">
            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>'3']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    {{-- apar doar comment-urile active, vezi AdminPostController@post --}}

    @if(count($comments) > 0)

        @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">

                    <img height="65" class="media-object" src="{{$comment->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->author }}
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </h4>
                    <p>{{$comment->body}}</p>

                    @if(count($comment->replies) > 0)
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img height="65" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{ $reply->created_at->diffForHumans() }}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>
                            </div>
                             <br>
                            <!-- End Nested Comment -->
                            @endif
                        @endforeach
                    @endif

                    {!! Form::open(['method' => 'POST', 'action' => 'CommentsRepliesController@createReply']) !!}

                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                    <div class="form-group">
                        {!! Form::label('body', 'Body:') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control','rows'=>'2']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        @endforeach
    @endif

@stop