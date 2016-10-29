@extends('layouts.master')

@section('content')
<div class="jumbotron">
    <h1>TodoApp!</h1>
    <p class="lead">
        Хийх зүйлийнхээ жагсаалтыг тэмдэглэхийг хүсч байна уу... Таньд TodoApp-ийг танилцуулж байна
    </p>
    <p><a class="btn btn-lg btn-success" href="{{ url('todo') }}" role="button">Нэвтрэх</a></p>
</div>
@endsection