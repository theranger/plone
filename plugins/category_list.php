<?php



/*
Plugin Name: Category list
Plugin URI: http://ranger.risk.ee
Description: A widget to display list of categories
Author: Ivari Horm
Version: 1.0
Author URI: http://ranger.risk.ee/
*/



add_action( 'widgets_init', create_function( '', 'return register_widget("Category_List_Widget");' ) );



class Category_List_Widget extends WP_Widget {
	
	
	
	/**
	 * Constructor
	 */
	function Category_List_Widget() {
		
		$widget_ops = array(
			'classname'   => 'Category_List_Widget',
			'description' => __( 'Category List Widget' )
		);
		$this->WP_Widget( false, __( 'Category List Widget' ), $widget_ops );
		
	}
	
	
	
	/**
	 * Display the widget
	 */
	function widget( $args, $instance ) {
		
		global $wp_query, $post;
		
		extract( $args );
		
		echo $before_widget;

		//Get all the parent pages ID-s
		$parents = get_post_ancestors($post->ID);
		$k = count($parents);
		
		// Title
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_title;
		if(empty($title))
			echo "&nbsp;";
		else
			echo $title;
			
		echo $after_title;

		$cats = get_categories();
		print '<ul class="links">';
		foreach($cats as $cat) {
			print '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->cat_name.'</a></li>';
		}
		print '</ul>';

		echo $after_widget;		
	}
	
	
	
	/**
	 * Update the settings
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
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
		</div>
	
<?php

}

}

add_action( 'widgets_init', create_function('', 'return register_widget("Category_List_Widget");') );

?>