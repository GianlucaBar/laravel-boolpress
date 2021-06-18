@extends('layouts.app')

@section('content')
    <div>
        <h1>ciao sono la home pubblica</h1>

        <a href="{{ route('postlist') }}">vai ai post</a>
    </div>
@endsection