@extends('reader.layout')

@section('content')
    @foreach($blog->posts as $post)
        <div class="row">
            <div class="col">

                <article class="text-justify">
                    <header>
                        <h2>{{ $post->title }}</h2>
                    </header>
                    <p>
                        {{ $post->content }}
                    </p>
                </article>
            </div>
        </div>
    @endforeach
@endsection
