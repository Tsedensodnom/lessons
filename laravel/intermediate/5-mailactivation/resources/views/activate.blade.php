@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Баталгаажуулалт</div>

                <div class="panel-body">
                    <p>Та бүртгэлээ баталгаажуулна уу, баталгаажуулах холбоос таны цахим шуудан руу илгээгдсэн болно.</p>
                    <p>Хэрвээ дахин илгээхийг хүсвэл <a href="{{ url('user/sendactivation') }}">энд дарна</a> уу</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
