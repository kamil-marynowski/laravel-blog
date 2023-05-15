@extends('blog.layout')

@section('content')
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-success">Create new post</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
