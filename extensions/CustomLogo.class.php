<?php


class CustomLogo {

	private static $defaults = array();

	function __construct($height, $width) {
		self::$defaults = array(
			"height" => $height,
			"width" => $width,
		);
	}

	function __invoke() {
		add_theme_support("custom-logo", self::$defaults);
	}
}
