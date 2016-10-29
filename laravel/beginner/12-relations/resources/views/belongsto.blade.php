<div>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - Category: {{ $product->category->name }}</li>
        @endforeach
    </ul>
</div>