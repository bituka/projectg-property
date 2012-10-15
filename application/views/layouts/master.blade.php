<!DOCTYPE  html>
<html>
	<head>
		<meta charset="utf-8">
		<title>{{ $title }}</title>
		
		<!-- CSS -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="screen" />
		<link rel="stylesheet" href="{{ asset('css/social-icons.css') }}" type="text/css" media="screen" />
		<link rel="stylesheet" href="{{ asset('css/ecs.css') }}" media="all"  type="text/css"/>
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/ie8-hacks.css') }}" />
		<![endif]-->
		<!-- ENDS CSS -->	


		<!-- GOOGLE FONTS 
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->
		
		<!-- JS -->
		<script type="text/javascript" src="{{ asset('js/jquery-1.5.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery-ui-1.8.13.custom.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
		
		
		
		<!--[if IE]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="{{ asset('js/DD_belatedPNG.js') }}"></script>
			<script>
	      		/* EXAMPLE */
	      		//DD_belatedPNG.fix('*');
	    	</script>
		<![endif]-->
		<!-- ENDS JS -->
		
		
		<!-- eight column slider -->
		<script type="text/javascript" src="{{ asset('js/eight-col-slider.js') }}"></script>
		<!-- ENDS eight column slider -->

		<!-- css transitions -->
		<script type="text/javascript" src="{{ asset('js/css-trans.js') }}"></script>
		<!-- ENDS css transitions -->

		<!-- site master script -->
		<script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
		<!-- ENDS site master script -->

		<script type="text/javascript" src="{{ asset('js/jquery.watermark.min.js') }}"></script>

	</head>
<body id="{{ $current_page }}">

	<!-- HEADER -->
	<div id="header">
		<!-- wrapper-header -->
		<div class="wrapper">
			<!-- logo placeholder
			<a href="index.html"><img id="logo" src="img/logo.png" alt="Nova" /></a>
			-->
			<!-- search -->
			<div class="top-search">
				<form  method="get" id="searchform" action="#">
					<div>
						<input type="text" value="Search..." name="s" id="s" onfocus="defaultInput(this)" onblur="clearInput(this)" />
						<input type="submit" id="searchsubmit" value=" " />
					</div>
				</form>
			</div>
			<!-- ENDS search -->
			<!-- Contact Section -->
			<div class="contact-header">
				Suite 104, 163-169 Inkerman Street
				St Kilda, Victoria, 3182 Australia
	 <span style="font-size: medium; ">Telephone: 03 9041 5502</span>
			</div>
			
			<!-- End Contact Section -->
			<!-- Navigation -->
				<ul id="nav" class="sf-menu">
					<li><a class="with-hover <?php echo ( $current_page === 'home' ? 'current-menu-item' : '' ); ?>" href="<?php echo URL::to('/'); ?>">HOME PAGE</a></li>
					<li><a class="with-hover <?php echo ( $current_page === 'find a property' ? 'current-menu-item' : '' ); ?>" href="<?php echo URL::to('find_prop'); ?>">FIND A PROPERTY</a></li>
					<li><a class="with-hover <?php echo ( $current_page === 'about us' ? 'current-menu-item' : '' ); ?>" href="<?php echo URL::to('about'); ?>">ABOUT US</a></li>
					<li><a class="with-hover <?php echo ( $current_page === 'property news' ? 'current-menu-item' : '' ); ?>" href="<?php echo URL::to('news'); ?>">PROPERTY NEWS</a></li>
					<li><a class="with-hover <?php echo ( $current_page === 'contact us' ? 'current-menu-item' : '' ); ?>" href="<?php echo URL::to('contact'); ?>">CONTACT US</a></li>
				</ul>
				<!-- Navigation -->
		</div>
		<!-- ENDS wrapper-header -->					
	</div>
	<!-- ENDS HEADER -->
   <div class="wrapper">

	  @yield('content')
	

   </div>
	<!-- footer -->
		<div id="footer">
			<div class="wrapper">
				<p>&copy;LinQ Property Pty Ltd All rights reserved</p>
			</div>
		</div>
		
	<!-- ENDS footer -->

	</body>
<html>
