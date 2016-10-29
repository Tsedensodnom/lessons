<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Laravel Beginner - 11. Session, Flash, Cache</title>
    
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('blog.css') }}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item {{ url()->current() == url('/') ? 'active' : '' }}" href="{{ url('/') }}">Session</a>
          <a class="blog-nav-item {{ url()->current() == url('/flash') ? 'active' : '' }}" href="{{ url('/flash') }}">Flash</a>
          <a class="blog-nav-item {{ url()->current() == url('/cache') ? 'active' : '' }}" href="{{ url('/cache') }}">Cache</a>
        </nav>
      </div>
    </div>

    <div class="container">
        @yield('content')
    </div>
    
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  </body>
</html>