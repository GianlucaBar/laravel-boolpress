@extends('layouts.app')

@section('content')
    <div>

        <div class="container">
            @if($post_category)
            <h4>{{ $post_category->name }}</h4>
            @endif
            
            <h1>{{ ucfirst( $post->title ) }}</h1>

            <div class="cover-image">
                <img src="{{ asset('storage/' . $post->cover) }}">
            </div>
            <div> <strong>Slug:</strong> {{ $post->slug }}</div>

            <p>{{ $post->content }}</p>

            <div>
                <strong>Tags:</strong> 
                @foreach ($post_tags as $tag)
                    {{ $tag->name }}{{ $loop->last ? '' : ', ' }}
                @endforeach
            </div>
        </div>
    </div>
@endsection