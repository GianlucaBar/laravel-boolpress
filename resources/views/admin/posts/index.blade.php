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

                <a class="btn btn-success" href="{{route('admin.posts.edit',['post' => $post->id])}}">Edit post</a>

                
                <form action="{{ route('admin.posts.destroy', [
                    'post' => $post->id
                ]) }} " method="post">
                
                @csrf
                @method('DELETE')
    
                <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger" value="elimina">
                </form>
            </div>
            @endforeach

        </div>
    </div>
@endsection