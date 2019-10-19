<aside>
	<?php if (is_active_sidebar("left")) dynamic_sidebar("left"); ?>
</aside>

<article>
	<h1><?php the_title(); ?></h1>
	<?php get_template_part("templates/meta", "post"); ?>
	<?php the_content(); ?>
	<?php comments_template("", true); ?>
</article>

<aside>
	<?php if (is_active_sidebar("right")) dynamic_sidebar("right"); ?>
</aside>
