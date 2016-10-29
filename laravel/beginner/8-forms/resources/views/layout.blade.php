<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ebulan - Laravel Beginner - 8. Forms</title>

    <!-- Bootstrap core CSS -->
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
                <a class="blog-nav-item {{ url()->current()==url('/theatre')?'active':'' }}" href="{{ url('/theatre') }}">Театр</a>
                <a class="blog-nav-item {{ url()->current()==url('/')?'active':'' }}" href="{{ url('/') }}">Кино</a>
                <a class="blog-nav-item" href="#">Холбоо барих</a>
            </nav>
        </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <p class="lead blog-description">Laravel Beginner - 8. Forms</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
            @yield('content')
        </div>

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>Ebulan</h4>
            <p>Laravel Beginner - 8. Forms</p>
          </div>
        </div>

      </div>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  </body>
</html>