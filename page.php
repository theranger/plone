<?php get_header() ?>
<?php the_post(); ?>

	<div class="content">
		<h1><?php the_title(); ?></h1>
		<?php if (function_exists("has_excerpt") && has_excerpt()): ?>
			<div class="excerpt"><?php the_excerpt(); ?></div>
		<?php endif;?>
		<?php
			$content = apply_filters('the_content', get_the_content());
			$content = str_replace(']]>', ']]&gt;', $content);
			if(empty($content)):
		?>


				<?php
				$last_query = $wp_query;
				$wp_query = new WP_Query();
				$wp_query->query('posts_per_page=-1&orderby=menu_order&order=ASC&post_type=page&post_parent='.get_the_ID());
			?>

			<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div class="list">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</div>
			<?php endwhile; $wp_query = $last_query; wp_reset_postdata(); else: ?>
			<?php endif; ?>

		<?php else: ?>
			<?php echo $content; ?>
		<?php endif; ?>

		<?php
		if (class_exists("Attachments")) {
			$attachments = new Attachments('attachments');
			}
		if ($attachments->exist()):
		?>
		<div class="attachments">
			<div class="title">Seonduv sisu</div>
			<ul>
				<?php while ($attachments->get()): ?>
					<?php
					$img = "icons/" . basename($attachments->subtype()) . ".png";
						if(!is_file(dirname(__FILE__)."/".$img)) $img = "icons/application.png";
					?>
					<li style="background-image: url(<?php echo  get_bloginfo('template_directory').'/'.$img; ?>);">
						<a href="<?php echo $attachments->url() ?>"><?php echo $attachments->field('title') ?></a>
						<p><?php echo $attachments->field('caption') ?></p>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>

		<?php endif; ?>

		<?php if (!empty($content)) comments_template(); ?>

	</div>

<?php get_footer(); ?>
