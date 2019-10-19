<?php get_header(); ?>

<?php if (!have_posts()) : ?>
	<?php get_template_part("templates/page", "notfound"); ?>
<?php endif; ?>

<?php if (is_page()) while (have_posts()) : the_post(); ?>
	<?php if (count($children = get_children(array("post_parent" => get_the_ID()))) > 0): ?>
		<?php
		set_query_var("children", $children);
		get_template_part("templates/page", "listing");
		?>
	<?php else: ?>
		<?php get_template_part("templates/" . get_post_type(), get_post_custom()["custom-layout"][0]); ?>
	<?php endif; ?>
<?php endwhile; ?>

<?php get_footer(); ?>
