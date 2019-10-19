<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<title><?php wp_title(" ", true, "right"); ?></title>
	<meta http-equiv="Content-Type"
		  content="text/html; charset=<?php bloginfo("charset"); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link type="text/css" rel="stylesheet"
		  href="<?php echo get_css_url("screen.css"); ?>" media="screen"/>
	<link type="text/css" rel="stylesheet"
		  href="<?php echo get_css_url("print.css"); ?>" media="print"/>

</head>

<body <?php body_class(); ?>>
<header>
	<span>
		<a href="<?php echo home_url(); ?>"><?php the_custom_logo(); ?></a>
		<span class="search"><?php get_search_form(); ?></span>
	</span>
	<nav>
		<ul>
			<?php wp_list_pages('depth=1&sort_column=menu_order&title_li='); ?>
		</ul>
	</nav>
</header>
