<form action="{{ route('product.store') }}" method="post">
    {{ csrf_field() }}
    <div>
        <label for="">Name</label>
        <input type="text" name="name"/>
    </div>
    <div>
        <label for="">Qt</label>
        <input type="text" name="qt"/>
    </div>
    <div>
        <label for="">Price</label>
        <input type="text" name="price"/>
    </div>
    <div>
        <label for="">Description</label>
        <textarea name="description"></textarea>
    </div>
    <div>
        <input type="submit" value="Хадгалах"/>
    </div>
</form>