@extends('blog.layout')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-success" href="{{ route('blogs.create') }}">Create new blog</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->name }}</td>
                    <td>{{ $blog->description }}</td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="{{ route('blogs.posts.index', ['blog' => $blog]) }}" class="btn btn-primary">Posty</a>
                        <a href="" class="btn btn-info">Przegląd</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
