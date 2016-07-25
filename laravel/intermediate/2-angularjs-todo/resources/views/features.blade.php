@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <h2>Laravel 5.2</h2>
        <p>Laravel 5.2 ашиглан хөгжүүлэлт хийгдсэн</p>
    </div>
    
    <div class="col-lg-4">
        <h2>AngularJS</h2>
        <p>AngularJS ашигласан</p>
    </div>
    
    <div class="col-lg-4">
        <h2>Performance</h2>
        <p>Хурдтай ажиллагаа</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <p><a class="btn btn-lg btn-success" href="{{ url('todo') }}#/login" role="button">Нэвтрэх</a></p>
    </div>
</div>
@endsection