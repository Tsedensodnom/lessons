@extends('layouts.app')

@section('contentheader_title')
    {{ $pageTitle }}
@endsection

@section('main-content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $secondTitle or 'Жагсаалт' }}</h3>
                <div class="box-tools">
                    <a href="{{ url($urlName.'/create') }}" class="pull-left btn btn-sm btn-primary" style="margin-right: 10px;">
                        <i class="fa fa-plus"></i> Шинэ
                    </a>
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        @foreach ($columns as $item)
                            <th>{{ $item['label'] }}</th>
                        @endforeach
                        <th></th>
                    </tr>
                    @foreach ($model as $item)
                        <tr>
                            @foreach ($columns as $key => $column)
                                @if ($key == 'id')
                                    <td><a href="{{ url($urlName.'/'.$item->id.'/edit') }}">{{ $item->$key }}</a></td>
                                @else
                                    <td>{{ $item->$key }}</td>
                                @endif
                            @endforeach
                            <td>
                                <div class="btn-group pull-right">
                                    <a href="{{ url($urlName.'/'.$item->id.'/edit') }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                    <button attr-id="{{ $item->id }}" class="button-delete btn btn-default"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $model->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="hidden">
    {!! Form::open(['id' => 'form-delete', 'method' => 'delete', 'url' => '']) !!}
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')
@parent
    
<script type="text/javascript">
    $(document).ready(function() {
        console.log('hello');
        $('.button-delete').click(function() {
            if (confirm("Устгах")) {
                var id = $(this).attr('attr-id');
                var url = "{{ url($urlName) }}/" + id;
                $("#form-delete").attr('action', url);
                $("#form-delete").submit();
            }
        });
    });
</script>
@endsection