<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('fileupload/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fileupload/css/jquery.fileupload.css') }}">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style type="text/css">
        body {
          padding-top: 5rem;
        }
        .starter-template {
          padding: 3rem 1.5rem;
          text-align: center;
        }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
      <a class="navbar-brand" href="#">Зураг</a>
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Зураг жагсаалт</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/upload') }}">Шинэ зураг нэмэх</a>
        </li>
      </ul>
    </nav>

    <div class="container">

      @yield('content')

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('fileupload/js/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('fileupload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('fileupload/js/jquery.fileupload.js') }}"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('scripts', '')
  </body>
</html>