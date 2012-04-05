<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="author" content="Ivari Horm" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<meta name="viewport" content="width=640" />
	
	<?php if(substr($_SERVER["SERVER_NAME"],strrpos($_SERVER["SERVER_NAME"], '.')+1) == "lan"): ?>
		<script type="text/javascript">
			var disqus_developer = 1;
		</script>
	<?php endif; ?>
	
	<title><?php
	if (is_home()) {
		bloginfo('name');
	}
	elseif (is_404()) {
		echo '404 Not Found'; echo ' | '; bloginfo('name');
	}
	elseif (is_category()) {
		echo 'Category:'; wp_title(''); echo ' | '; bloginfo('name');
	}
	elseif (is_search()) {
		echo 'Search Results'; echo ' | '; bloginfo('name');
	}
	elseif ( is_day() || is_month() || is_year() ) {
		echo 'Archives:'; wp_title(''); echo ' | '; bloginfo('name');
	}
	else {
		echo wp_title(''); echo ' | '; bloginfo('name');
	}
	global $codename,$$codename; ?>
	</title>
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/print.css" type="text/css" media="print" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/mobile.css" type="text/css" media="only screen and (max-device-width: 800px)" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
	<link rel="icon" type="image/ico" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
	<?php wp_head(); ?>
</head>
<body>
	<div class="top">
		<div class="logo">
			<a href="<?php echo get_option('home') ?>" class="logo">
				<img src="<?php bloginfo('template_directory'); ?>/images/logo.gif" alt="<?php bloginfo('name'); ?>" class="logo" />
			</a>
			<p><?php bloginfo('description'); ?></p>
		</div>
		<div class="search">
			<form method="get" action="<?php echo get_option('home') ?>">
				<input type="text" name="s" value="<?php echo empty($_GET["s"])?"Otsing":$_GET["s"]; ?>" onfocus="if(value=='Otsing') value='';" onblur="if(value=='') value='Otsing';" /><input type="submit" value="Otsi" class="button" />
			</form>
		</div>
		<?php wp_nav_menu(array('show_home' => 'Uudised', 'container_class' => 'mainmenu', 'theme_location' => 'primary',  'depth' => 1 ) ); ?>
		<div class="bar"></div>
	</div>
	<div class="main">
	
	<?php get_sidebar("left"); ?>
	<?php get_sidebar("right"); ?>