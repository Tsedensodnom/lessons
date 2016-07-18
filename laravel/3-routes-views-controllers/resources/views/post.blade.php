@extends('layouts.master')

@section('title', 'Нүүр хуудас')

@section('content')
    <! -- Blog Post 1 -->
 	<p><img class="img-responsive" src="{{ asset('assets/img/post01.jpg') }}"></p>
 	<a href="{{ route('post', ['id' => $post->id]) }}"><h3 class="ctitle">{{ $post->title }}</h3></a>
 	<p><csmall>Нийтлэсэн: {{ date('Y-m-d', strtotime($post->created_at)) }}</csmall></p>
 	
 	{{ $post->content }}
@endsection