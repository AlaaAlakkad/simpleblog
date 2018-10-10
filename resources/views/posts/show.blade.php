@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="row mb-5">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <hr>
            <div>
                @foreach ($post->tags as $tag)
                    <span class="badge badge-secondary">{{$tag->name}}</span>
                @endforeach
            </div>
            <div class="backend-comments mt-5">
                <h3>Comments <small class="badge badge-secondary small-badge">{{$post->comments()->count()}} total</small></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comments as $comment)
                            <tr>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>
                                    <a href="{{route('comments.edit', $comment->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{route('comments.destroy', $comment->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <dl class="row">
                        <label class="col-sm-2"><strong>Url:</strong></label>
                        <p class="col-sm-10"> <a href="{{route('blog.single', $post->slug)}}">{{route('blog.single', $post->slug)}}</a></p>
                    </dl>
                    <dl class="row">
                        <label class="col-sm-4"><strong>Category:</strong></label>
                        <p class="col-sm-8">{{$post->category->name}}</p>
                    </dl>
                    <dl class="row">
                        <label class="col-sm-4"><strong> Created At: </strong></label>
                        <p class="col-sm-8">{{Helper::formatDate($post->created_at)}}</p>
                    </dl>
                    <dl class="row">
                        <label class="col-sm-4"><strong>Updated At:</strong></label>
                        <p class="col-sm-8">{{Helper::formatDate($post->updated_at)}}</p>
                    </dl>

                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </div>
                        <div class="col-md-12 mt-3">
                            <a href="{{route('posts.index')}}" class="btn btn-outline-secondary btn-block"><< See All Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection