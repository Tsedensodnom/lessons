@extends('layout')

@section('content')
<div class="blog-post">
    <a href="{{ url('post', $post->id) }}" class="blog-post-title">{{ $post->title }}</a>
    <p class="blog-post-meta">
        {{ date('Y-m-d', strtotime($post->created_at)) }} - 
        @if (count($post->categories))
            {{ implode(', ', array_pluck($post->categories, 'name')) }}
        @else
            Uncategorized
        @endif
    </p>
    <div>
        {!! $post->content !!}
    </div>
</div>
@endsection