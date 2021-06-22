@extends('layouts.app')

@section('content')
    <div>

        <div class="container">
            @if($post_category)
            <h4>{{ $post_category->name }}</h4>
            @endif
            
            <h1>{{ ucfirst( $post->title ) }}</h1>

            <div> <strong>Slug:</strong> {{ $post->slug }}</div>

            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection