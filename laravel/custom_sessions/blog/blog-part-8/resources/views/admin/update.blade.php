@extends('layouts.app')

@section('contentheader_title')
    {{ $pageTitle }}
@endsection

@section('main-content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{ $updateTitle }}</h3>
    </div>
    
    {!! Form::open(array('url' => $urlName.'/'.$model->id, 'method' => 'put', 'class'=>'form-horizontal')) !!}
      <div class="box-body">
        @include('admin._form', [
          'fields' => $fields,
        ])
      </div>
      
      <div class="box-footer">
        <a href="{{ url($urlName) }}" class="btn btn-default">Цуцлах</a>
        <button type="submit" class="btn btn-info pull-right">Хадгалах</button>
      </div>
    {!! Form::close() !!}
  </div>
@endsection