<form action="{{ route('product.update', ['id' => $model->id]) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div>
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $model->name }}"/>
    </div>
    <div>
        <label for="">Qt</label>
        <input type="text" name="qt" value="{{ $model->qt }}"/>
    </div>
    <div>
        <label for="">Price</label>
        <input type="text" name="price" value="{{ $model->price }}"/>
    </div>
    <div>
        <label for="">Description</label>
        <textarea name="description">{{ $model->description }}</textarea>
    </div>
    <div>
        <input type="submit" value="Хадгалах"/>
    </div>
</form>