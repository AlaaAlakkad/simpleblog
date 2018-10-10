@extends('layouts.app')
@section('title', 'All Posts')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-4 offset-md-2">
            <a href="{{route('posts.create')}}" class="btn btn-block btn-primary btn-lg">Create New Posts</a>
        </div>
        <div class="col-md-12">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{Helper::formatLongStrings($post->body)}}</td>
                        <td>{{Helper::formatDateForTable($post->created_at)}}</td>
                        <td><a href="{{route('posts.show', $post->id)}}" class="btn">View</a> <a href="{{route('posts.edit',$post->id)}}" class="btn">Edit</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-8 offset-md-4">
            {{$posts->links()}}
        </div>
    </div>


@endsection