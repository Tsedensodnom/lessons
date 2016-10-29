<div><b>ID</b>: {{ $model->id }}</div>
<div><b>Name</b>: {{ $model->name }}</div>
<div><b>Qt</b>: {{ $model->qt }}</div>
<div><b>Price</b>: {{ $model->price }}</div>
<div><b>Description</b>: {{ $model->description }}</div>
<div><a href="{{ route('product.index') }}">Буцах</a></div>
<hr>
<form action="{{ route('product.destroy', ['id' => $model->id]) }}" method="post">
    <input type="hidden" name="_method" value="DELETE">
    {{ csrf_field() }}
    <input type="submit" value="Устгах"/>
</form>