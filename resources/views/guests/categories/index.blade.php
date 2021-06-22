@extends('layouts.app')

@section('content')
    <div>
        <h1>Lista Post</h1>

        <div class="posts-container">

            @foreach ($categories as $category)
            <div class="post-card">
                <h2>{{ $category->name }}</h2>

                <a class="btn btn-primary" href="{{ route('category-page', ['slug' => $category->slug])}}">Show post</a>
            </div>
            @endforeach

        </div>
    </div>
@endsection