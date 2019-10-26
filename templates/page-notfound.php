<main class="two-columns">
	<h1>Page not found</h1>
	<p>This page cannot be located. Please use search to refine your query.</p>

	<h2>Search</h2>
	Type something in and click the button.
	<p><?php echo get_search_form(); ?></p>
</main>

<aside>
	<?php if (is_active_sidebar("right")) dynamic_sidebar("right"); ?>
</aside>
