@extends('layouts.app')

@section('content')
<div class="starter-template">
    <h1>{{ $album->name }}</h1>
    <p class="lead">Нийт оруулсан зураг</p>
</div>

@foreach ($photos->chunk(4) as $photoSet)
    <div class="row">
        @foreach ($photoSet as $photo)
            <div class="col-md-3">
                <img src="{{ asset('uploads/'.$photo->filename) }}" class="img-thumbnail img-responsive">
            </div>
        @endforeach
    </div>
@endforeach

@endsection