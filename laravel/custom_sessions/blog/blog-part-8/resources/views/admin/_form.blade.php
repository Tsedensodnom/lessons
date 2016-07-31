@foreach ($fields as $key => $field)
    <div class="form-group">
        <label for="input_{{ $key }}" class="col-sm-2 control-label">{{ $field['label'] }}</label>
        
        <div class="col-sm-10">
            @if ($field['type'] == 'text')
                <input value="{{ $model->$key or '' }}" name="{{ $key }}" class="form-control" id="input_{{ $key }}" placeholder="{{ $field['placeholder'] or '' }}">
            @elseif ($field['type'] == 'richeditor')
                <textarea id="input_{{ $key }}" name="{{ $key }}" rows="10" cols="80">{{ $model->$key or '' }}</textarea>
            @elseif ($field['type'] == 'dropdown')
                @if (isset($field['model']))
                    <?php
                        $className = $field['model'];
                        $options = $className::select($field['select'])->get();
                        $data = [];
                        $select1 = $field['select'][0];
                        $select2 = $field['select'][1];
                        foreach ($options as $value) {
                            $data[$value->$select1] = $value->$select2;
                        }
                    ?>
                    {!! Form::select($key, $data, isset($model->$key)?$model->$key:null, ['id' => 'input_'.$key, 'class' => 'form-control', 'style' => 'width: 100%;']) !!}
                @else
                @endif
            @elseif ($field['type'] == 'password')
                <input class="form-control" type="password" name="{{ $key }}" id="input_{{ $key }}"/>
            @elseif ($field['type'] == 'relation')
                <?php
                    $className = $field['model'];
                    $options = $className::select($field['select'])->get();
                    $data = [];
                    $select1 = $field['select'][0];
                    $select2 = $field['select'][1];
                    foreach ($options as $value) {
                        $data[$value->$select1] = $value->$select2;
                    }
                    
                    $selected = [];
                    if (isset($model)) {
                        $selected = array_pluck($model->$key, $field['select'][0]);
                    }
                ?>
                @foreach ($data as $dataKey => $item)
                <div class="checkbox">
                    <label>
                        <input name="{{ $key }}[]" type="checkbox" value="{{ $dataKey }}" {{ in_array($dataKey, $selected)?'checked':'' }}>
                        {{ $item }}
                    </label>
                </div>
                @endforeach
            @endif
        </div>
    </div>
@endforeach

@section('htmlheader')
@parent
@foreach ($fields as $key => $field)
    @if ($field['type'] == 'dropdown')
        <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" type="text/css" />
    @endif
@endforeach
@endsection

@section('scripts')
@parent
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        @foreach ($fields as $key => $field)
            @if ($field['type'] == 'richeditor')
                CKEDITOR.replace('input_{{ $key }}');
            @endif
            
            @if ($field['type'] == 'dropdown')
                // $("#input_{{ $key }}").select2();
            @endif
        @endforeach
    });
</script>
@endsection