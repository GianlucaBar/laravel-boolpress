@extends('layouts.app')

@section('content')
    <div>
        <h1>Lista Post</h1>

        <div class="posts-container">
            @foreach ($posts as $post)
            <div class="post-card">
                <h2>{{ ucfirst($post->title) }}</h2>

                <p>{{ $post->content }}</p>

                <a class="btn btn-primary" href="{{route('admin.posts.show',['post' => $post->id])}}">Show post</a>
            </div>
            @endforeach

        </div>
    </div>
@endsection