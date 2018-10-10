@extends('layouts.app')
@section('title','Create New Post')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}"
@endsection
@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1>Create New Post</h1>
        <hr>

        <form action="{{route('posts.store')}}" method="POST" data-parsley-validate>
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required maxlength="255">
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input class="form-control" type="text" name="slug" required minlength="5" maxlength="255">
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tag:</label>
                <select name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple" required>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="body">Post Body:</label>
                <textarea name="body" id="body" class="form-control" rows="20" required></textarea>
            </div>
            <button class="btn btn-success btn-block">Create Post</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('js/parsley.min.js')}}" defer></script>
    <script src="{{asset('js/select2.min.js')}}" defer></script>
@endsection

<script>
    window.onload = function(){
        $('document').ready(function(){
            $('.select2-multi').select2();
        });
    };
</script>