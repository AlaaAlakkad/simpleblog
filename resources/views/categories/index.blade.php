@extends('layouts.app')
@section('title', 'All Categories')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="{{route('categories.store')}}" method="POST">
                        <h2>New Category</h2>
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection