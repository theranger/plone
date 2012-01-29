<?php get_header() ?>
<?php the_post(); ?>

	<div class="content">
		<h1><?php the_title(); ?></h1>
		<div class="meta">By <?php the_author_link(); ?> at <?php the_time(get_option('date_format')); ?></div>
		<?php if (function_exists("has_excerpt") && has_excerpt()): ?>
			<div class="excerpt"><?php the_excerpt(); ?></div>
		<?php endif;?>
		<?php the_content(); ?>
		
		<?php comments_template(); ?> 
	</div>

<?php get_footer() ?>
