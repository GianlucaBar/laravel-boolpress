@extends('layouts.app')

@section('content')
    <div>
        <h1>Lista Post</h1>

        <div class="posts-container">
            @foreach ($posts as $post)
            <div class="post-card">
                <h2>{{ $post->title }}</h2>

                <p>{{ $post->content }}</p>

                <a class="btn btn-primary" href="{{  }}">Show post</a>
            </div>
            @endforeach

        </div>
    </div>
@endsection