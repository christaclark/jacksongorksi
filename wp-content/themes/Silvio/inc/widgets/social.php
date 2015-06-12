<?php

/*
Plugin Name: Social Widget
Plugin URI: http://silviuandrei.eu
Description: Displays social links.
Version: 1.0
Author: Silviu Andrei
Author URI: http://silviuandrei.eu
*/

add_action( 'widgets_init', 'recent_social_widget_init' );

function recent_social_widget_init() {
	register_widget( 'recent_social_widget' );
}

// Extend WP_Widget with our widget.
class recent_social_widget extends WP_Widget {
	
	function recent_social_widget() {
	
		$widget_ops = array( 'description' => __('Display your social links', 'silver') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'recent_social_widget' );
		$this->WP_Widget( 'recent_social_widget', __('silver.socialLinks', 'silver'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('Social Links', $instance['title'] );
		$dribbble = $instance['dribbble'];
		$youtube = $instance['youtube'];
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$google = $instance['google'];
		$linkedin = $instance['linkedin'];
		$tumblr = $instance['tumblr'];
		$skype = $instance['skype'];

		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title; ?>
			
		<ul class="social">
			<?php if($dribbble) echo '<li><a href="'.$dribbble.'"><img src="'.get_template_directory_uri().'/images/dribbble.png"/></a></li>'; ?>
			<?php if($youtube) echo '<li><a href="'.$youtube.'"><img src="'.get_template_directory_uri().'/images/youtube.png"/></a></li>'; ?>
			<?php if($facebook) echo '<li><a href="'.$facebook.'"><img src="'.get_template_directory_uri().'/images/facebook.png"/></a></li>'; ?>
			<?php if($twitter) echo '<li><a href="'.$twitter.'"><img src="'.get_template_directory_uri().'/images/twitter.png"/></a></li>'; ?>
			<?php if($google) echo '<li><a href="'.$google.'"><img src="'.get_template_directory_uri().'/images/google.png"/></a></li>'; ?>
			<?php if($linkedin) echo '<li><a href="'.$linkedin.'"><img src="'.get_template_directory_uri().'/images/linkedin.png"/></a></li>'; ?>
			<?php if($tumblr) echo '<li><a href="'.$tumblr.'"><img src="'.get_template_directory_uri().'/images/tumblr.png"/></a></li>'; ?>
			<?php if($skype) echo '<li><a href="'.$skype.'"><img src="'.get_template_directory_uri().'/images/skype.png"/></a></li>'; ?>
		</ul>
		
		<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['google'] = strip_tags( $new_instance['google'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['skype'] = strip_tags( $new_instance['skype'] );

		return $instance;
	}
	
	
	function form($instance) {

		$defaults = array( 'title' => 'Social Links', 'dribbble' => '', 'youtube' => '', 'facebook' => '', 'twitter' => '', 'google' => '', 'linkedin' => '', 'tumblr' => '', 'skype' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>">Dribbble:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>">Youtube:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Facebook:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Twitter:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'google' ); ?>">Google:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" value="<?php echo $instance['google']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">Linkedin:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>">Tumblr:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'skype' ); ?>">Skype:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo $instance['skype']; ?>" />
		</p> <?php 
	}

} 
?>
