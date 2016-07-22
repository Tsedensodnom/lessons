@extends('layout')

@section('content')
<div class="blog-post">
    <a href="{{ url('post', $post->id) }}" class="blog-post-title">{{ $post->title }}</a>
    <p class="blog-post-meta">{{ $post->created_at }}</p>
    <div>
        {{ $post->content }}
    </div>
</div>
@endsection