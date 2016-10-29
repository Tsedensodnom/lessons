@extends('layouts.master')

@section('content')
<div class="blog-header">
    <h1 class="blog-title">Flash</h1>
</div>

<div class="row">
    <div class="col-sm-12 blog-main">
        <div>
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert">{{ session('status') }}</div>
            @endif
        </div>
        <form class="form-horizontal" method="post" action="{{ url('sendmessage') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Имейл</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Текст</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="message" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Захидал илгээх</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection