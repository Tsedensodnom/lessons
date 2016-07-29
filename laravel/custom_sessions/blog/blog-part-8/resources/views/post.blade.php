@extends('layout')

@section('content')
<div class="blog-post">
    <a href="{{ url('post', $post->id) }}" class="blog-post-title">{{ $post->title }}</a>
    <p class="blog-post-meta">{{ date('Y-m-d', strtotime($post->created_at)) }} - {{ $post->category->name or 'Uncategorized' }}</p>
    <div>
        {!! $post->content !!}
    </div>
</div>
@endsection