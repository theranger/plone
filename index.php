<?php get_header() ?>
<?php query_posts(array('showposts' => 2)); ?>

	<div class="content">
		<?php while (have_posts()) : the_post(); ?>
		<div class="list sparse">
			<h2>
				<span class="right"><?php the_date();?></span>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
		<?php if (function_exists("has_excerpt") && has_excerpt()): ?>
			<div class="excerpt"><?php the_excerpt(); ?></div>
		<?php endif;?>
		<?php the_content(); ?>
		</div>
		<?php endwhile;?>
	</div>

<?php get_footer(); ?>
