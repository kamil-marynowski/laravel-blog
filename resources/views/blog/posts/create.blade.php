@extends('blog.layout')

@section('content')
    <form action="{{ route('blogs.posts.store', ['blog' => $blog]) }}" method="post">
        @csrf
        <div>
            <label>Title</label>
            <input class="form-control" type="text" name="title">
        </div>
        <div>
            <label>Content</label>
            <textarea class="form-control" name="content"></textarea>
        </div>
        <div>
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
@endsection
