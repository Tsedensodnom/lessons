<!DOCTYPE html>
<html lang="en" ng-app="todoApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Ebulan</title>
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    
    <script type="text/javascript" src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/lodash/dist/lodash.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/angular-route/angular-route.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/angular-local-storage/dist/angular-local-storage.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/restangular/dist/restangular.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/controllers.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/services.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css">
        .container {
            margin-bottom: 40px;
        }
    </style>
  </head>

  <body>

    <div class="blog-masthead">
        <div class="container">
            <nav class="blog-nav">
                <a class="blog-nav-item {{ url()->current()==url('/')?'active':'' }}" href="{{ url('/') }}">Нүүр</a>
                <a class="blog-nav-item {{ url()->current()==url('/todo')?'active':'' }}" href="{{ url('/todo') }}">TodoApp</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="blog-header">
            <h1 class="blog-title">Laravel Intermediate</h1>
            <p class="lead blog-description">2. AngularJS Part 1 - TodoApp</p>
        </div>
        
        <div class="row">
            <div class="col-sm-8 blog-main">
                <div ng-view></div>
            </div>
            
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                @section('sidebar')
                    @include('partials.sidebar')
                @show
            </div>
        </div>
    </div>
    
    <footer class="blog-footer">
        <p>AngularJS Part 1 - TodoApp - <a href="https://ebulan.com">Ebulan</a>.</p>
    </footer>
    
    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  </body>
</html>