<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TQ4ZCPD');</script>
<!-- End Google Tag Manager -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php bloginfo('name'); ?> - <?php wp_title(); ?></title>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/functions.js"></script>
<!--http://29d.35c.myftpupload.com/wp-content/themes/renobikeproject/css/globals.css-->
	
	<?php if(is_front_page()) { ?>
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/homepage.css" rel="stylesheet" type="text/css" media="screen" /><?php } ?>
	<!---->
	<link href="<?php bloginfo('template_directory'); ?>/assets/css/print.css" rel="stylesheet" type="text/css" media="print" />
	
	<!--[if IE 8]><link href="<?php bloginfo('template_directory'); ?>/assets/css/ie8.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->
	<!--[if IE 7]><link href="<?php bloginfo('template_directory'); ?>/assets/css/ie7.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->
	<!--[if lte IE 6]>
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/ie6.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta3)/IE7.js">IE7_PNG_SUFFIX=".png";</script>
		<![endif]--> 
	
	
	<?php /* If you want plugins to work correctly, don't delete this */ wp_head(); ?> 
	<link href="<?php bloginfo('template_directory'); ?>/assets/css/globals.css" rel="stylesheet" type="text/css" media="screen" />

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQ4ZCPD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
	
	<div id="header" class="clr">
		<a href="<?php bloginfo('url'); ?>" class="logo">The Reno Bike Project - A Community Bike Shop</a>
		<a href="<?php bloginfo('url'); ?>/?page_id=510" class="hours">We're open Monday thru Sunday</a>
	
		<div class="slideshow">
			<img src="<?php bloginfo('template_directory'); ?>/assets/images/main-image.jpg" />
		</div>
		
		<a href="<?php bloginfo('url'); ?>/?page_id=3528" class="bike-map">Shop Playa Gear</a>
		<a href="<?php bloginfo('url'); ?>/?page_id=249" class="donate">Make a Donation</a>
		<a href="<?php bloginfo('url'); ?>/?page_id=2415" class="become_member">Become a Member</a>
	</div>
	<!-- END #HEADER ===================================== -->

	<div id="main-nav" class="clr">
		<?php wp_nav_menu(array( 'theme_location' => 'main_nav')); ?> 
		<ul>	
			<li class="search">
				<?php get_search_form(); ?>
			</li>
		</ul>
	</div>
	<!-- END #MAIN-NAV ===================================== -->
	
	<?php if(is_front_page()) { ?>
	
	<div id="feature" class="clr">
		<div id="image">
			<img src="<?php bloginfo('template_directory'); ?>/assets/images/building-front.jpg" width="559" height="387" alt="" />
		</div>
		
		<div class="content">
			<h2>Welcome to Reno Bike Project</h2>
			<p>
				The organization is built around the belief that the bicycle is the world&#8217;s greatest, most utilized mode of transportation and that every individual, regardless of age, gender, race, or class has a right to afford, maintain, and enjoy one. 
			</p>
			<a href="<?php bloginfo('url'); ?>/?page_id=21" class="action">Check it out</a>
		</div>
		
		<a href="<?php bloginfo('url'); ?>/?page_id=571" class="newsletter"><span>Get Bike Project News in your Inbox</span></a>

		<ul class="social">
			<li class="twitter"><a href="http://www.twitter.com/renobikeproject">Twitter</a></li>
			<li class="flickr"><a href="http://www.flickr.com/renobikeproject">Flickr</a></li>
			<li class="instagram"><a href="http://instagram.com/renobikeproject">Instagram</a></li>
			<li class="facebook"><a href="http://www.facebook.com/renobikeproject">Facebook</a></li>
			<li class="rss"><a href="/rss">RSS</a></li>
		</ul>		
	</div>
	<!-- END #FEATURE ===================================== -->
	<?php } ?>

	<!-- START #CONTENT ===================================== -->	
		
	<div class="top">&nbsp;</div>
	<div id="content" class="clr">