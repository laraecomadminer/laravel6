<html>
	<head>
		<title>
		@yield('title', 'Laravel Ecomerce Project')
		</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
    <script src="https://use.fontawesome.com/6d4a84ac89.js"></script>
  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	</head>
<body>

<div class="wrapper">

		<!-- navigation -->
			@include('partials.nav')
			@include('partials.message')
		<!-- end naver part -->
		
		@yield('content')
		
		<!-- footer -->
		<footer class="footer-bottom">
			<p class="text-center">&copy; All right reserved 2019 | Ecomerce</p>
		</footer>
</div>
	
	
	<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>



