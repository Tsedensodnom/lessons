@extends('layout')

@section('content')
    @foreach ($movies as $movie)
        <div><b>{{ $movie->name }}</b> - {{ $movie->year }}</div>
    @endforeach
    <hr>
    
    @foreach ($errors->all() as $e)
        <div>{{ $e }}</div>
    @endforeach
    
    <form method="post" action="{{ action('MovieController@store') }}">
        <div class="form-group">
            <label>Киноны нэр</label>
            <input class="form-control" type="text" name="name"/>
        </div>
        
        <div class="form-group">
            <label for="">Он</label>
            <input class="form-control" type="text" name="year"/>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-default" value="Хадгалах"/>
    </form>
@endsection