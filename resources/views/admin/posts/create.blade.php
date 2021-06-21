@extends('layouts.app')

@section('content')
<div class="container form_container">
    <h2>Aggiungi un Post</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="content">Descrizione</label>
            <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Invia">
    </form>
</div>
@endsection