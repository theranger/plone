<?php

if(function_exists('register_sidebar')) register_sb();


function register_sb() {
	register_sidebar(array(
		'name' => 'Left Sidebar',
		'id' => 'sidebar-left',
		'before_widget' => '<div class="widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title">',
		'after_title' => '</div>',
	));
	
	register_sidebar(array(
		'name' => 'Right Sidebar',
		'id' => 'sidebar-right',
		'before_widget' => '<div class="widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title">',
		'after_title' => '</div>',
	));
}


//function new_excerpt_length($length) { return 20; }
//add_filter('excerpt_length', 'new_excerpt_length');

include(TEMPLATEPATH.'/plugins/pages_tree.php');
define("SUBPAGE_NAVIGATION_SCRIPT",false);
?>