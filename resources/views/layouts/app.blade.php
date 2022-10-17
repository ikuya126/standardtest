<!DOCTYPE html>
	<html lang="ja">

	<head>
  	<meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js?ver=1.11.3'></script>
	  <title>@yield('title')</title>
	</head>

	<body>
	  
	  @yield('content')
    
	</body>

</html>