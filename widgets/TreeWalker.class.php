<?php


class TreeWalker extends Walker_Page {

	function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0) {
		if ($current_page == 0) return;

		// Ancestors of the page currently being displayed
		$ancestors = get_ancestors($current_page, "page");

		// Show top-level tree
		if (count($page->ancestors) == 1) goto out;

		// Page is a subpage and we are not in front page
		if (count($ancestors) > 0 && in_array($current_page, $page->ancestors)) goto out;

		// Show siblings
		if ($page->ancestors == $ancestors) goto out;

		return;

		out:
		$output .= '<li><a href="' . get_the_permalink($page) . '">' . get_the_title($page) . '</a></li>';
	}
}
