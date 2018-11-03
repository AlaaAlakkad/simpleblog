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
        @for ($i = 0; $i < sizeof($posts); $i++)
            <div class="post">
                <h3>{{$posts[$i]->title}}</h3>
                <p>{{Helper::formatLongStrings($posts[$i]->body)}}</p>
                <a href="{{route('blog.single',$posts[$i]->slug)}}" class="btn btn-primary">Read more</a>
            </div>
            @if ($i != sizeof($posts)-1)
                <hr>
            @endif
        @endfor
    </div>
    <div class="col-md-2 offset-md-2">
        <h2>Sidebar</h2>
    </div>
</div>
@endsection