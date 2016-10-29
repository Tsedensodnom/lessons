@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My profile</div>

                <div class="panel-body">
                    <div><b>ID:</b> {{ $user->id }}</div>
                    <div><b>Name:</b> {{ $user->name }}</div>
                    <div><b>Email:</b> {{ $user->email }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
