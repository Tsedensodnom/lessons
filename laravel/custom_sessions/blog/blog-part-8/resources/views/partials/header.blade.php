<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item {{ url()->current()==url('/')?'active':'' }}" href="{{ url('/') }}">Нүүр</a>
            @foreach ($categories as $category)
                <a 
                    class="blog-nav-item {{ url()->current()==url('category', $category->id)?'active':'' }}" 
                    href="{{ url('category', $category->id) }}">
                    {{ $category->name }} ({{ $category->posts()->count() }})
                </a>
            @endforeach
        </nav>
    </div>
</div>