<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title(' | ', true, 'right'); ?></title>
		<!-- Mobile
	  ================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSS
	  ================================================== -->
	  	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />


		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>



		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
		<!-- Favicons
		================================================== -->
		<!--
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
		-->
		
		<!-- Core Header
		================================================== -->
		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

	<div id="nav-container" class="clearfix">
		<div class="header <?php if( is_front_page() ): echo "home"; endif;?>">
			<header>
				<div id="nav-wrapper">
					<nav>
						<?php 
						wp_nav_menu( array('menu'   => 'Primary Navigation'));
						?>
						<div class="social-nav">
							<ul>
								<li><a href="#" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</nav>
				</div>
			</header>
		</div>
	</div>





	<!-- End Header -->
