<?php get_header(); ?>

<?php if(!is_front_page()) { ?>
<div class="page-content">
	
	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="page-title"><?php the_title(); ?><span><?php _e('by', 'silver'); ?> <?php the_author(); ?></span></h1>
			<?php
				if ( $images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ))) {
					echo '
					<div class="flexslider flexslide on-pages">
						<ul class="slides">';
								foreach( $images as $image ) {
									echo '<li><a data-gal="photo" href="' . wp_get_attachment_url($image->ID, 'full') . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'silver' ), the_title_attribute( 'echo=0' ) ) ) . '" rel="bookmark">' . wp_get_attachment_image($image->ID, 'blog-thumb') . '</a></li>';
								}
							echo '
						</ul>
					</div>';
				  }
				else {
					$thumbnail_id = get_post_thumbnail_id();				
					$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'blog-thumb' );	
					$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);

					echo '<img class="indimgm" src="' . $thumbnail[0] . '" alt="'. $alt_text .'"/>';
				}
			?>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'silver' ),
					'after'  => '</div>',
				) );
			?>
		</article>

	<?php endwhile; // end of the loop. ?>
	
</div>
<?php }; ?>

<?php get_footer(); ?>
