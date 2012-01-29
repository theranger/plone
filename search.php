<?php get_header() ?>

	<div class="content">
		<h1>Otsing: <?php echo $_GET["s"]?></h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="list">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</div>
		<?php endwhile; else: ?>
			<p>Otsing ei andnud tulemusi</p>
		<?php endif; ?>
	</div>

<?php get_footer() ?>