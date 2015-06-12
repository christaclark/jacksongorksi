<?php 

/* Template Name: Portfolio */

get_header(); ?>

<div class="page-content tpc clearfix">
	<div id="filters">
	<?php	
	
		$portfolio_filters = get_terms( 'portfolio_filter' );
		if( $portfolio_filters ) {
			$filters = '
				<ul class="clearfix">
					<li><a href="#filter" data-option-value="*" class="active selected">' . __('All', 'silver') . '</a><span>&nbsp;/&nbsp;</span></li>';
					foreach( $portfolio_filters as $portfolio_filter ) {
						$filters .= '<li><a href="#filter" data-option-value=".term-' . $portfolio_filter->slug . '">' . $portfolio_filter->name . '</a><span>&nbsp;/&nbsp;</span></li>';
					}
			$filters .= '</ul>';
			echo $filters;
		}; 
	?>
	</div>

	<div class="team portfolio">
		
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'portfolio',
			'paged' => $paged,
			'posts_per_page' => 6,
		);
			
		$the_query = new WP_Query($args);
		if ( $the_query->have_posts() ) :
			echo '<ul id="portfolio-wrapper" class="items imglist clearfix">';
			
				while ( $the_query->have_posts() ) : $the_query->the_post();
					if ( has_post_thumbnail()) {
						$thumbnail_id = get_post_thumbnail_id();				
						$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'folio-columns' );	
						$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
						echo '
						<li class="portfolio';
						$terms = get_the_terms( get_the_ID(), 'portfolio_filter' );
						if( $terms ) { 
							foreach ($terms as $term ) { 
								echo ' term-' . $term -> slug; 
							} 
						}; 
						echo ' portfolio-item">
							<img class="team-member" src="' . $thumbnail[0] . '" alt="'. $alt_text .'"/>
							<h3>'.get_the_title().'</h3>
							<p>'.limit_words( get_the_excerpt(), '10' ).'</p>
							<span><a href="'.get_permalink().'">'.__('more&hellip;', 'silver').'</a></span>
						</li>';
					}
					
				silver_content_nav( 'nav-below' );
				endwhile;
			
			echo '</ul>'; ?>
				
			<ul class="team-direction-nav">
				<li><?php next_posts_link( 'Older Entries', $the_query->max_num_pages ); ?></li>
				<li><?php previous_posts_link( 'Newer Entries' ); ?></li>
			</ul>
				
			<?php
			wp_reset_postdata();
		else:
			_e( 'Sorry, no posts matched your criteria.', 'silver' );
		endif;
		?>
	</div> 
</div>

<?php get_footer(); ?>
