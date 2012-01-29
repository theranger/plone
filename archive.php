<?php get_header() ?>
<?php the_post(); ?>

<?php rewind_posts(); ?>
	<div class="content">
		<?php if(is_day()): ?>
			<h1><?php printf("Arhiiv: %s", get_the_time(get_option('date_format'))); ?></h1>
		<?php elseif(is_month()): ?>
			<h1><?php printf("Arhiiv: %s", get_the_time('F Y')); ?></h1>
		<?php elseif(is_year()): ?>
			<h1><?php printf("Arhiiv: %s", get_the_time('Y')); ?></h1>
		<?php elseif(is_category()): ?>
			<h1><?php printf("Teema: %s", single_cat_title('', false)); ?></h1>
		<?php endif; ?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="list">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</div>
		<?php endwhile; else: ?>
		<?php endif; ?>
	</div>

<?php get_footer() ?>