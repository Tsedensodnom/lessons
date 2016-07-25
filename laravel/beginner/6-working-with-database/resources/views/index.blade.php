@extends('layout')

@section('content')

<h3>Movies</h3>
<ul>
    @foreach ($movies as $movie)
        <li>
            <div><b>{{ $movie->id }} - {{ $movie->title }}</b> - {{ $movie->released }}</div>
            <small>{{ $movie->description }}</small>
        </li>
    @endforeach
</ul>

@endsection