<?php



/*
Plugin Name: Sticky Posts
Plugin URI: http://ranger.risk.ee
Description: A widget to display sticky posts in a newspaper style
Author: Ivari Horm
Version: 1.0
Author URI: http://ranger.risk.ee/
*/



add_action( 'widgets_init', create_function( '', 'return register_widget("Sticky_Posts_Widget");' ) );



class Sticky_Posts_Widget extends WP_Widget {
	
	
	
	/**
	 * Constructor
	 */
	function Sticky_Posts_Widget() {
		
		$widget_ops = array(
			'classname'   => 'Sticky_Posts_Widget',
			'description' => __( 'Sticky Posts Widget' )
		);
		$this->WP_Widget( false, __( 'Sticky Posts Widget' ), $widget_ops );
		
	}
	
	
	
	/**
	 * Display the widget
	 */
	function widget( $args, $instance ) {
		
		global $wp_query, $post;
		
		extract( $args );
		
		echo $before_widget;
	
		// Title
		$title = apply_filters( 'widget_title', $instance['title'] );
		if ( !empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		
		// Number of posts
		if ( !$number = (int)$instance['number'] ) $number = 5;
		else if ( $number < 1 ) $number = 1;
		
		// Create Query
		$posts_query = array(
			'post__in'       => get_option( 'sticky_posts' ),
			'posts_per_page' => $number,
			'orderby'        => 'date',
			'post_status'    => 'publish'
		);
		$sticky_posts = new WP_Query( $posts_query );
		
		// The Loop
		while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post(); update_post_caches( $posts );
			if(!is_sticky()) continue;
			echo '<div class="sticky">';
			echo '<h1><a href="'.get_permalink().'">';
			the_title();
			echo '</a></h1>';
			echo '<div class="belt">';
			the_content("Loe edasi...");
			echo '</div></div>';
		endwhile;
		$post = $wp_query->post;
		setup_postdata( $post );

		echo $after_widget;		
	}
	
	
	
	/**
	 * Update the settings
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = (int)$new_instance['number'];
		return $instance;
	}
	
	/**
	 * Admin form
	 */
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		if ( !isset( $instance['number'] ) || !$number = (int)$instance['number'] ) $number = 5;
		
		?>
		<div id="themeable-sticky-posts-admin-panel">
			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo $instance['title']; ?>" /></p>
			<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		</div>
	
<?php

}

}

add_action( 'widgets_init', create_function('', 'return register_widget("Sticky_Posts_Widget");') );

?>