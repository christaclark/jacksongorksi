<?php get_header(); ?>

<div class="page-content clearfix">
	<div class="l-sidebar">
		<ul class="jCar">
			<?php 
		
			$args = array(  
				'post_type' => 'portfolio', 
				'showposts' => -1  
			);
			$postID = $post->ID;
			$the_query = new WP_Query($args);
			if( $the_query->have_posts() ) {
				
				while ($the_query->have_posts()) : $the_query->the_post();
					$sel = get_the_ID() == $postID ? 'active-post' : '';
					echo '<li class="post-'.get_the_ID().' '.$sel.'"><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
				endwhile;
				wp_reset_query();
			}
			?>
		
			
		</ul>
	</div>
	<div class="main-c">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php
				  if ( get_post_meta( get_the_ID(), 'silver_youtube', true ) ) {
					echo '<iframe width="700" height="400" src="http://www.youtube.com/embed/'. get_post_meta( get_the_ID(), 'silver_youtube', true ) . '?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>'; 
				  }
				  
				  else if ( get_post_meta( get_the_ID(), 'silver_vimeo', true ) ) {
					echo '<iframe src="http://player.vimeo.com/video/'. get_post_meta( get_the_ID(), 'silver_vimeo', true ) .'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="700" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; 
				  }

				  else {
					if ( has_post_thumbnail()) {
					  echo '<div class="work-showcase">'.get_the_post_thumbnail(get_the_ID(), 'folio-single' ).'</div>';
					}
				  }
				  
				?>

				<div id="scroller" style="height: 173px; padding-right: 40px; overflow: hidden;" >
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>