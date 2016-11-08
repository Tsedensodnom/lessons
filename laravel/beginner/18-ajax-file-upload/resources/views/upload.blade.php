@extends('layouts.app')

@section('content')
<div class="starter-template">
    <h1>Шинэ цомог нэмэх</h1>
    <p class="lead">Хүссэн зургаа хуулах</p>
</div>

<form action="{{ url('/album/create') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Цомгийн нэр</label>
        <input class="form-control" name="name">
        <input type="hidden" id="photoIds" class="form-control" name="photo_ids" value="[]">
    </div>
    <div class="form-group">
        <span class="btn btn-success fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Хуулах зураг сонгох...</span>
            <input id="fileupload" type="file" name="photos" multiple>
        </span>
        <br><br>
        <div id="progress" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>
        <div id="files" class="files row"></div>
    </div>
    <button type="submit" class="btn btn-default">Хадгалах</button>
</form>
@endsection

@section('scripts')
<script>
$(function () {
    'use strict';
    var url = '{{ url('upload') }}';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        formData: {
        	'_token': '{{ csrf_token() }}'
        },
        done: function (e, data) {
            var count = $('#files img').length;

            $.each(data.result.files, function (index, file) {
                var elem = $('<div class="col-sm-2"/>');
                var elemPhoto = $(elem).html($('<img class="img-thumbnail img-responsive" src="uploads/photos/'+file.name+'"/>'));
                if (count % 6 == 0) {
                    var elemRow = $('<div class="row" style="margin: 10px 0;"/>').html(elemPhoto);
                    $(elemRow).appendTo('#files');
                } else {
                    $(elemPhoto).appendTo('#files .row:last-child');
                }
                count++;

                var obj = JSON.parse($('#photoIds').val());
                obj.push(file.id);
                $('#photoIds').val(JSON.stringify(obj));
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
    	.parent()
    	.addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
@endsection