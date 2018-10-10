@extends('layouts.app')
@section('title', "Edit Tag")

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{route('tags.update', $tag->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Title:</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$tag->name}}">
                </div>
 
                    <button class="btn btn-primary btn-block">Save Changes</button>
            </form>
        </div>
    </div>


@endsection