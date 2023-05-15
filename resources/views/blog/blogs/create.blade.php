@extends('blog.layout')

@section('content')
    <form action="{{ route('blogs.store') }}" method="post">
        @csrf
        <div>
            <label>Name</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div>
            <label>Description</label>
            <input class="form-control" type="text" name="description">
        </div>
        <div>
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
@endsection
