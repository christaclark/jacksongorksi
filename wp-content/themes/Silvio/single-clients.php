<?php get_header(); ?>

<div class="page-content">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="page-title"><?php the_title(); ?></h1>
		 <?php if(!post_password_required()) { ?> 
			<div class="address"><?php echo get_post_meta(get_the_ID(),'cl_address',true) ?></div>
			<div class="upload_doc"><a href="<?php echo get_post_meta(get_the_ID(),'upload_doc',true) ?>"><?php _e('Download','silver'); ?></a></div>
		<?php }; ?>
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
		
		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>

	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
