@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2">
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <hr>
            <p>posted In: {{$post->category->name}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="comments-title">{{$post->comments()->count()}} Comments</h3>
            @foreach ($post->comments as $comment)
                <div class="mb-4 comment">
                    <div class="author-info">
                        <img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email)))}}" alt="" class="author-image float-left">
                        <div class="author-name float-left">
                            <h4>
                                {{$comment->name}}
                            </h4>
                            <p class="author-time">
                                 {{Helper::formatDate($comment->created_at)}}
                            </p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{$comment->comment}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{route('comments.store', $post->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="comment">Comment:</label>
                        <textarea name="comment" id="comment" cols="30" rows="5" class="form-control">
                        </textarea>
                        <button class="btn btn-success btn-block mt-3">Add Comment</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection