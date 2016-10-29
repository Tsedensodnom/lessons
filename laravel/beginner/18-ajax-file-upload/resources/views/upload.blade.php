@extends('layouts.app')

@section('content')
<div class="starter-template">
    <h1>Шинэ зураг нэмэх</h1>
    <p class="lead">Хүссэн зургаа хуулах</p>
</div>

<span class="btn btn-success fileinput-button">
    <i class="glyphicon glyphicon-plus"></i>
    <span>Хуулах зураг сонгох...</span>
    <input id="fileupload" type="file" name="photos[]" multiple>
</span>
<br>
<br>
<div id="progress" class="progress">
    <div class="progress-bar progress-bar-success"></div>
</div>
<div id="files" class="files"></div>
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
            $.each(data.result.files, function (index, file) {
                $('<p/>').text('Хуулагдсан: ' + file.name).appendTo('#files');
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