@extends('layouts.app')

@section('content')
<div class="starter-template">
    <h1>Шинэ зураг нэмэх</h1>
    <p class="lead">Хүссэн зургаа хуулах</p>
</div>

<form action="{{ url('upload') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="input_file">Зураг</label>
        <input name="photo" type="file" id="input_file">
    </div>
    
    <button type="submit" class="btn btn-default">Нэмэх</button>
</form>
@endsection