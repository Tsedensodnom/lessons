@extends('layout')

@section('content')

@foreach ($posts as $post)
    <div class="blog-post">
        <a href="{{ url('post', $post->id) }}" class="">{{ $post->title }}</a>
        <div>{{ mb_substr(strip_tags($post->content), 0, 200) }}...</div>
        <p class="blog-post-meta">{{ date('Y-m-d', strtotime($post->created_at)) }}</p>
    </div>
@endforeach

{{ $posts->links() }}

@endsection