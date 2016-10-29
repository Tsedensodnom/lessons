@extends('layouts.app')

@section('content')
<div class="starter-template">
    <h1>Жагсаалт</h1>
    <p class="lead">Нийт оруулсан зураг</p>
</div>

@foreach ($photos->chunk(4) as $photoSet)
    <div class="row">
        @foreach ($photoSet as $photo)
            <div class="col-md-4">
                <img class="img-responsive" src="{{ asset($photo) }}"></img>
                {{ $photo }}
            </div>
        @endforeach
    </div>
@endforeach

@endsection