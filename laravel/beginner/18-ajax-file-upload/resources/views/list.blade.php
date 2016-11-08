@extends('layouts.app')

@section('content')
<div class="starter-template">
    <h1>Жагсаалт</h1>
    <p class="lead">Нийт оруулсан цомог</p>
</div>

@foreach ($albums->chunk(4) as $albumSet)
    <div class="row">
        @foreach ($albumSet as $album)
            <div class="col-md-3">
                <a href="{{ url('album/'.$album->id) }}">
                    <img src="uploads/{{ $album->cover }}" class="img-thumbnail img-responsive">
                    <center><h3>{{ $album->name }}</h3></center>
                </a>
            </div>
        @endforeach
    </div>
@endforeach

@endsection