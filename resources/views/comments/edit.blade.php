@extends('layouts.app')
@section('title', 'Edit Comment')
@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Comment</h1>

            <form action="{{route('comments.update', $comment->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$comment->name}}" disabled>
                </div>
                <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control"  type="email" name="email" id="email" value="{{$comment->email}}" disabled>
                </div>
                <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control"  name="comment" id="comment">
                                {{$comment->comment}}
                        </textarea>
                </div>

                <button class="btn btn-success btn-block">Update Comment</button>
            </form>
        </div>
    </div>
@endsection