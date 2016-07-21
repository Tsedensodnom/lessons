@extends('layouts.master')

@section('title', 'Page 2')

@section('sidebar')
    @parent
    <p>Sidebar content from view2.</p>
@endsection

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1>Page 2!</h1>
        <p>Page 2 content</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
@endsection