@extends('layout')

@section('sidebar')
    @parent
    
    <div class="sidebar-module">
        <h4>Ангилал</h4>
        <ol class="list-unstyled">
            @foreach ($categories as $category)
                <li><a href="{{ url('category', $category->id) }}">{{ $category->name }}</a></li>
            @endforeach
        </ol>
    </div>
@endsection

@section('content')

@foreach ($posts as $post)
    <div class="blog-post">
        <a href="{{ url('post', $post->id) }}" class="blog-post-title">{{ $post->title }}</a>
        <p class="blog-post-meta">{{ $post->created_at }}</p>
    </div>
@endforeach

{{ $posts->links() }}

@endsection