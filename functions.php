<?php

try {
	spl_autoload_register(function ($class) {
		@include_once TEMPLATEPATH . "/extensions/" . $class . ".class.php";
	});

	spl_autoload_register(function ($class) {
		@include_once TEMPLATEPATH . "/widgets/" . $class . ".class.php";
	});
} catch (Exception $ex) {
	die($ex->getMessage());
}

add_action("widgets_init", new PagesTree);
add_action('widgets_init', new Sidebar);
add_action("after_setup_theme", new CustomLogo(42, 234));


function get_image_url($image) {
	return get_template_directory_uri() . "/images/" . $image;
}

function get_css_url($css) {
	return get_template_directory_uri() . "/css/" . $css;
}
