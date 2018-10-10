@extends('layouts.app')
@section('title', 'HomePage')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
                <h1>Welcome to my Blog</h1>
                <p>Thank you for visiting. This is a test website built with Laravel. Please read my popular post!</p>
                <a href="#" class="btn btn-primary">Popular Post</a>
        </div>
    </div>


    <div class="col-md-8">
        <?php $i=1 ?>
        @foreach ($posts as $post)
        <div class="post">
            <h3>{{$post->title}}</h3>
            <p>{{Helper::formatLongStrings($post->body)}}</p>
            <a href="{{route('blog.single',$post->slug)}}" class="btn btn-primary">Read more</a>
        </div>
        @if ($i != count($posts))
            <hr>
        @endif
        <?php $i++ ?>
        @endforeach
    </div>
    <div class="col-md-2 offset-md-2">
        <h2>Sidebar</h2>
    </div>
</div>
@endsection