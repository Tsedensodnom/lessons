<a href="{{ route('product.create') }}">Шинэ бүтээгдэхүүн нэмэх</a>
<table>
    <tr>
        <td><b>ID</b></td>
        <td><b>Name</b></td>
        <td><b>Qt</b></td>
        <td><b>Price</b></td>
        <td></td>
    </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->qt }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('product.edit', ['id' => $product->id]) }}">Засах</a>
                <a href="{{ route('product.show', ['id' => $product->id]) }}">Харах</a>
            </td>
        </tr>
    @endforeach
</table>