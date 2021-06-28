@extends('layouts.app')

@section('content')
<div class="container form_container">
    <h2>Modifica il Post</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', [ 'post' => $post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}">
        </div>

        <div class="form-group">
            <label for="content">Descrizione</label>
            <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <h5>Tags</h5>

            @foreach ($tags as $tag)
            <div class="form-check">

                @if ($errors->any())
                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="Tag-{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                @else
                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="Tag-{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'checked' : '' }}>
                @endif
                
                <label class="form-check-label" for="Tag-{{ $tag->id }}">
                    {{$tag->name}}
                </label>
            </div> 
            @endforeach
        </div>

        <div class="form-group">
            <label for="cover-image">Immagine di compertina</label>
            <input type="file" class="form-control-file" name="cover-image" id="cover-image">
        </div>

        <input type="submit" class="btn btn-primary" value="Salva">
    </form>
</div>
@endsection