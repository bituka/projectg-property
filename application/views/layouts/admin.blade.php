<!DOCTYPE  html>
<html>
	<head>
		<meta charset="utf-8">
		<title>{{ $title }}</title>
		
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->	



		<!-- bootstrap, this conflict with the front end css so this layout shoud only be used in the backend -->
		{{ Asset::container('bootstrapper')->styles(); }}
		{{ Asset::container('bootstrapper')->scripts(); }}
		<!-- ENDS bootstrap -->


		
		<!-- JS -->
		<!--<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>-->
		<!-- <script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script> -->
		<!-- <script type="text/javascript" src="js/easing.js"></script> -->

		<script type="text/javascript" src="{{ URL::to_asset('js/jquery-1.5.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::to_asset('js/jquery-ui-1.8.13.custom.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::to_asset('js/easing.js') }}"></script>
		<script type="text/javascript" src="{{ URL::to_asset('js/css-trans.js') }}"></script>



		<script type="text/javascript" src="{{ URL::to_asset('js/site.js') }}"></script>
		
		

		<!--[if IE]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	

	</head>
	<body id="{{ $current_page }}">



		@yield('content')
	


		
	<!-- ENDS footer -->

	</body>
<html>
