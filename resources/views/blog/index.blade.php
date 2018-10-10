@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2">
            <h1>Blog</h1>
        </div>
    </div>
    <?php $i=1 ?>
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8 offset-md-2 mb-5">
                <h2>{{$post->title}}</h2>
                <h5>Published: {{Helper::formatDate($post->created_at)}}</h5>
                <p>{{Helper::formatLongStrings($post->body)}}</p>
                <a href="{{route('blog.single',$post->slug)}}" class="btn btn-primary">Read More</a>
                @if ($i != sizeof($posts))
                    <hr>
                @endif
            </div>
        </div>

        <?php ++$i ?>
    @endforeach
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            {{$posts->links()}}
        </div>
    </div>

@endsection