<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="{{ asset('assets/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
  </head>

  <body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('home') }}">Ebulan blog</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('posts') }}">Нийтлэл</a></li>
            <li><a href="{{ route('categories') }}">Ангилал</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <div id="blue">
    	<div class="container">
    		<div class="row">
    			<h3>@yield('second_title', 'Нийтлэл')</h3>
  			</div>
			</div>
		</div>
		
		<div class="container mtb">
	 		<div class="row">
	 		  <! -- BLOG POSTS LIST -->
		 		<div class="col-lg-8">
		 			@yield('content')
				</div><! --/col-lg-8 -->
		 		@include('partials.sidebar')
		 	</div><! --/row -->
	 	</div><! --/container -->
	 	
	 	@include('partials.footer')
	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/retina-1.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.hoverdir.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.hoverex.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.prettyPhoto.js') }}"></script>
  	<script src="{{ asset('assets/js/jquery.isotope.min.js') }}"></script>
  	<script src="{{ asset('assets/js/custom.js') }}"></script>
  </body>
</html>
