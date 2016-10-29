<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="{{ url('/') }}">Нүүр</a>
            @foreach ($categories as $category)
                <a class="blog-nav-item" href="{{ url('category', $category->id) }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </nav>
    </div>
</div>