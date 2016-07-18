@extends('layouts.master')

@section('title', 'Нүүр хуудас')

@section('content')
    @foreach ($posts as $post)
        <p>
            <img class="img-responsive" src="{{ asset('assets/img/post01.jpg') }}">
        </p>
        <a href="{{ route('post', ['id' => $post->id]) }}">
            <h3 class="ctitle">{{ $post->title }}</h3>
        </a>
        <p>
            <csmall>Нийтлэсэн: {{ date('Y-m-d', strtotime($post->created_at)) }}</csmall>
        </p>
        <p>{{ mb_substr(strip_tags($post->content), 0, 300) }}...</p>
        <p>
            <a href="single-post.html">[дэлгэрэнгүй]</a>
        </p>
        <div class="hline"></div>
        <div class="spacing"></div>
    @endforeach
    {{ $posts->links() }}
@endsection