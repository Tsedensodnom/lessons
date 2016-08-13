@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All user</div>
                <div class="panel-body">
                    @foreach ($users as $user)
                        <div>
                            {{ $user->email }}
                            @can ('admin-access')
                                <a href="{{ url('users/edit', $user->id) }}"> | Update</a>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
