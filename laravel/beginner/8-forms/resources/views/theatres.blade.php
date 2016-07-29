@extends('layout')

@section('content')
    @foreach ($theatres as $item)
        <div>{{ $item->name }}</div>
    @endforeach
    <hr>
    
    <form method="post" action="{{ url('theatre/store') }}">
        <div class="form-group">
            <label>Кино театр</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}"/>
        </div>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-default" value="Хадгалах"/>
    </form>
@endsection