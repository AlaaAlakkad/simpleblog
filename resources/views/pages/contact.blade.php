@extends('layouts.app')
@section('title', 'Contact us')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form action="/" method="get">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
@endsection