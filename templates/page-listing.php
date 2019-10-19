<aside>
	<?php if (is_active_sidebar("left")) dynamic_sidebar("left"); ?>
</aside>

<main>
	<h1><?php the_title(); ?></h1>
	<?php the_excerpt(); ?>

	<?php global $children;
	foreach ($children as $child): ?>
		<h2>
			<a href="<?php echo get_permalink($child) ?>"><?php echo get_the_title($child) ?></a>
		</h2>
		<?php echo get_the_excerpt($child); ?>
	<?php endforeach; ?>

	<?php comments_template("", true); ?>
</main>

<aside>
	<?php if (is_active_sidebar("right")) dynamic_sidebar("right"); ?>
</aside>
