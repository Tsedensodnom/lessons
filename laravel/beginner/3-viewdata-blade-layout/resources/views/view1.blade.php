@extends('layouts.master')

@section('title', 'Page 1 title')

@section('sidebar')
    @parent
    <p>this is sidebar from view1</p>
@endsection

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1>Page 1!</h1>
        <p>Page 1 content</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
@endsection