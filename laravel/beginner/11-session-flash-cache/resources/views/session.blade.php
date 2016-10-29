@extends('layouts.master')

@section('content')
<div class="blog-header">
    <h1 class="blog-title">Session</h1>
</div>

<div class="row">
    <div class="col-sm-12 blog-main">
        View count: {{ $count }} <br>
        New data: {{ $data }} <br>
        <a href="{{ url('setSession') }}">Generate new data</a>
    </div>
</div>
@endsection