@extends('layouts.app')
@section('title', "$tag->name Tag")
@section('content')

        <div class="row">
            <div class="col-md-8">
                <h1>{{ $tag->name }} Tag <small class="badge badge-secondary small-badge">{{$tag->posts->count()}} Posts</small></h1>
            </div>
            <div class="col-md-2">
                <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary btn-block float-right mt-2">Edit</a>
            </div>
            <div class="col-md-2">
                <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger btn-block mt-2">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tag</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tag->posts as $post)
                            <tr>
                                <th>{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                    <span class="badge badge-secondary">{{$tag->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
