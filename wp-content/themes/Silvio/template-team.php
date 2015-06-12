<?php 

/* Template Name: Team */

get_header(); ?>

	<div class="team tmsl flex">
	
		<?php
		$args = array(
			'post_type' => 'team',
			'posts_per_page' => -1
		);
		
		$the_query = new WP_Query($args);
		if ( $the_query->have_posts() ) :
			echo '<ul class="slides clearfix">';
			
				while ( $the_query->have_posts() ) : $the_query->the_post();
					if ( has_post_thumbnail()) {
						$thumbnail_id = get_post_thumbnail_id();				
						$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'folio-columns' );	
						$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
						echo '						
						<li>
							<div class="imglist"><img class="team-member tm" src="' . $thumbnail[0] . '" alt="'. $alt_text .'"/></div>
							<h3>'.get_the_title().'</h3>
							<p>'.limit_words( get_the_excerpt(), '8' ).'</p>
							<span>
								<img class="mail" src="'.get_template_directory_uri().'/images/mail.png" alt="send mail" /><a href="mailto:'.get_post_meta(get_the_ID(),'sm_link',true).'">'.__('send email', 'silver').'</a>
								<img class="eye" src="'.get_template_directory_uri().'/images/eye.png" alt="more info" /><a href="'.get_permalink().'">'.__('more info', 'silver').'</a>
							</span>
						</li>';
					}
				endwhile;
			
			echo '</ul>'; ?>
				
			<?php
			wp_reset_postdata();
		else:
			_e( 'Sorry, no posts matched your criteria.', 'silver' );
		endif;
		?>

	</div>
	
	<?php		
	$the_query = new WP_Query('post_type=team&posts_per_page=-1');
	if ( $the_query->have_posts() ) :
		echo '<ul class="this_is_sparta">';
			while ( $the_query->have_posts() ) : $the_query->the_post();
				echo '<li><h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3></li>';
			endwhile;
		echo '</ul>';
	wp_reset_postdata();
	endif;
	?>

<?php get_footer(); ?>