<?php get_header(); ?>

<div class="page-content clearfix">
	<div class="l-sidebar lsteam">
		<ul>
			<?php			
			$the_query = new WP_Query('post_type=team&posts_per_page=8');
			if( $the_query->have_posts() ) {
				while ($the_query->have_posts()) : $the_query->the_post();
		
				if ( has_post_thumbnail()) {
					echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
				}
		
				endwhile;
				wp_reset_query();
			}
			?>
		</ul>
	</div>
	<div class="main-c">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php
				if ( has_post_thumbnail()) {
				  echo '<div class="work-showcase">' . get_the_post_thumbnail(get_the_ID(), 'folio-single' ) . '</div>';
				}			  
			?>

			<div id="scroller" style="height: 173px; padding-right: 40px; overflow: hidden;" >
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>