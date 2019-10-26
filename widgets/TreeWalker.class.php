<?php
/**
 * Copyright 2019 by Baltnet Communications (https://www.baltnet.ee)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *        http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

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
