@extends('layout')

@section('content')
<hr>
<h3>Students</h3>
<ul>
    @foreach ($students as $student)
        <li>
            {{ $student->first_name }} <b>{{ $student->last_name }}</b> - 
            {{ $student->reg_num }} - {{ $student->birthday }}
        </li>
    @endforeach
</ul>

@endsection