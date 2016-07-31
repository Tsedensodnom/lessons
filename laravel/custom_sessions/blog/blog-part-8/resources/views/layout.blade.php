<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ebulan Blog</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('partials.header')
    <div class="container">
        <div class="blog-header">
            <h1 class="blog-title">Ebulan Blog</h1>
            <p class="lead blog-description">Part 8 - Many-to-Many relations</p>
        </div>
        <div class="row">
            <div class="col-sm-8 blog-main">
                @yield('content')
            </div>

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                @section('sidebar')
                    <div class="sidebar-module sidebar-module-inset">
                        <h4>Бидний тухай</h4>
                        <p>Бидний тухай дэлгэрэнгүй текст</p>
                    </div>
                    
                    <div class="sidebar-module">
                        <h4>Ангилал</h4>
                        <ol class="list-unstyled">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ url('category', $category->id) }}">
                                        @if (url()->current() == url('category', $category->id))
                                            <b>{{ $category->name }} ({{ $category->posts()->count() }})</b>
                                        @else
                                            {{ $category->name }} ({{ $category->posts()->count() }})
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @show
            </div>
        </div>
    </div>

    <footer class="blog-footer">
        <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p><a href="#">Back to top</a></p>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>