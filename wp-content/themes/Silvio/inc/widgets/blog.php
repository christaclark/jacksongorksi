<?php

/*
Plugin Name: Recent Posts Widget
Plugin URI: http://silviuandrei.eu
Description: Displays recent blog posts.
Version: 1.0
Author: Silviu Andrei
Author URI: http://silviuandrei.eu
*/

add_action( 'widgets_init', 'recent_blog_widget_init' );

function recent_blog_widget_init() {
	register_widget( 'recent_blog_widget' );
}

// Extend WP_Widget with our widget.
class recent_blog_widget extends WP_Widget {
	
	function recent_blog_widget() {
	
		$widget_ops = array( 'description' => __('Display your recent posts', 'silver') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'recent_blog_widget' );
		$this->WP_Widget( 'recent_blog_widget', __('silver.RecentPosts', 'silver'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('Recent Posts', $instance['title'] );
		$show_num = $instance['show_num'];

		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title; ?>
			
		<ul>
			<?php
			global $post;
			$args = array( 'posts_per_page' => $show_num = $instance['show_num'] );
			$lastposts = get_posts( $args );
			foreach($lastposts as $post) : setup_postdata($post); ?>
				<li>
					<p><?php echo limit_words( get_the_excerpt(), '10' ); ?></p>
					<a href="<?php the_permalink(); ?>"><?php _e('more&hellip;', 'silver'); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		
		<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_num'] = strip_tags( $new_instance['show_num'] );

		return $instance;
	}
	
	
	function form($instance) {

		$defaults = array( 'title' => 'Recent Posts', 'show_num' => '3');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_num' ); ?>">Number of posts:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>" value="<?php echo $instance['show_num']; ?>" />
		</p> <?php 
	}

} 
?>
