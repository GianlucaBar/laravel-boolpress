@extends('layouts.app')

@section('content')
    <div>

        <div class="container">
            
            <h1>{{ ucfirst( $post->title ) }}</h1>

            <div> <strong>Slug:</strong> {{ $post->slug }}</div>

            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection