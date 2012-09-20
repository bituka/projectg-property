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

		<link rel="stylesheet" type="text/css" href="{{ URL::to_asset('css/admin.css') }}">
		
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

		@if($current_page !== 'login')
		    
			<div class="navbar navbar-inverse navbar-fixed-top">
		      <div class="navbar-inner">
		        <div class="container">
		          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </a>
		          <a class="brand" href="{{ URL::to_route('dashboard') }}">Dashboard</a>
		          <div class="nav-collapse">
		            <ul class="nav">
		<!--               <li class="active"><a href="{{ URL::to_route('dashboard') }}">Home</a></li> -->
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Properties <b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                  <li class="nav-header">Actions</li>
		                  <li><a href="{{ URL::to_route('add_property') }}">Add</a></li>
		                  <li><a href="#">Manage</a></li>
	  
		                </ul>
		              </li><!-- dropdown -->
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                  <li class="nav-header">Actions</li>
		                  <li><a href="{{ URL::to_route('add_category') }}">Add</a></li>
		                  <li><a href="#">Manage</a></li>

		                </ul>
		              </li><!-- dropdown -->
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">States <b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                  <li class="nav-header">Actions</li>
		                  <li><a href="{{ URL::to_route('add_state') }}">Add</a></li>
		                  <li><a href="{{ URL::to_route('states') }}">Manage</a></li>
	  
		                </ul>
		              </li><!-- dropdown -->
		            </ul>
		            <form method="GET" action="{{ route('logout') }}" class="navbar-form pull-right">
		              <button type="submit" class="btn btn-info">Logout</button>
		            </form>
		          </div><!--/.nav-collapse -->
		        </div>
		      </div>
		    </div>

		@endif

		
		<div class="container">


			@yield('content')
	

		</div>

		
	<!-- ENDS footer -->

	</body>
</html>
