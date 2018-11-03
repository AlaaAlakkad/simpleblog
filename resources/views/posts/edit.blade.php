@extends('layouts.app')
@section('title', 'Edit Blog Post')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection
@section('content')
    <div class="row mb-5">
        <div class="col-md-8">
            <form id="edit_form" action="{{route('posts.update', $post->id)}}" method="POST" data-parsley-validate >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control" required maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" id="slug" name="slug" value="{{$post->slug}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{($post->category_id == $category->id)? "selected=selected":""}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tag:</label>
                        <select name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple" required>
                            @for ($i = 0; $i < count($tags); $i++)
                                @php
                                    $select="";
                                    if(isset($values[$i]) && $values[$i]==$tags[$i]->id)
                                    $select="selected=selected"
                                @endphp
                                <option value="{{$tags[$i]->id}}" {{$select}}>{{$tags[$i]->name}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="body">Post Body:</label>
                        <textarea name="body" id="body" class="form-control" rows="20" required>{{$post->body}}</textarea>
                    </div>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-5">Created At:</dt>
                        <dd class="col-sm-7">{{Helper::formatDate($post->created_at)}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-5">Updated At:</dt>
                        <dd class="col-sm-7">{{Helper::formatDate($post->updated_at)}}</dd>
                    </dl>

                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-success btn-block" id="save">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('preload')

    <div id="preload"></div>

@endsection

@section('scripts')
    <script src="{{asset('js/parsley.min.js')}}" defer></script>
    <script src="{{asset('js/select2.min.js')}}" defer></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/loadEditor.js')}}"></script>
@endsection