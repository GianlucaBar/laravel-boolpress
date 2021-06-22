@extends('layouts.app')

@section('content')
    <div>
        <h1>{{$category->name}}</h1>

        <div class="posts-container">
            
            @foreach ($posts as $post)
            <div class="post-card">
                <h2>{{ ucfirst($post->title) }}</h2>

                <p>{{ $post->content }}</p>
                
                <a class="btn btn-primary" href="{{ route('showpost', ['slug' => $post->slug]) }}">Show post</a>
            </div>
            @endforeach
           

        </div>
    </div>
@endsection

