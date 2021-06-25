@extends('layouts.app')

@section('vue-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection

@section('footer-scripts')
    <script src="{{ asset('js/posts.js') }}"></script>
@endsection

@section('content')
    <div>
        <div id="root">
            <h1>Lista Post tramite api</h1>

            <div class="posts-container">
                
                <div class="post-card" v-for="post in posts">
                    <h2>@{{ post.title }}</h2>

                    <p>@{{ post.content }}</p>

                </div>

            </div>    
        </div>

    </div>
@endsection

