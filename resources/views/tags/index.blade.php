@extends('layouts.app')
@section('title', 'All Tags')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <th>{{$tag->id}}</th>
                        <td><a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="{{route('tags.store')}}" method="POST">
                        <h2>New Tag</h2>
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Create New Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection