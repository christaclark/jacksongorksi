<?php get_header(); ?>

<?php if(!is_front_page()) { ?>
<div class="page-content">

	<?php if ( have_posts() ) : ?>
		<div>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span><?php _e('by', 'silver'); ?> <?php the_author(); ?></span></h1>
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
				
				<div style="font-size:11px;">
				<?php
					_e('Posted in: ', 'silver');
					$categories_list = get_the_category_list( __( ', ', 'silver' ) );
					echo $categories_list;  
				?><?php if(get_the_tag_list()) { ?>, <span><?php _e('tagged:', 'silver'); ?></span><?php echo get_the_tag_list(' ', ', '); ?><?php }; ?>
				</div>
				
				<p><?php echo limit_words( get_the_excerpt(), '50' ); ?></p>
				
				<a class="rmore" href="<?php the_permalink(); ?>"><?php _e('read more', 'silver'); ?></a>&hellip;
				
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'silver' ),
						'after'  => '</div>',
					) );
				?>
			</article>
			
			<?php endwhile; ?>
			
			<?php silver_content_nav( 'nav-below' ); ?>
			
		</div>

	<?php else : ?>

		<?php _e( 'Sorry, no posts matched your criteria.', 'silver' ); ?>

	<?php endif; ?>
	
	<div class="sidebar-container">
		<?php get_sidebar(); ?>
	</div>

</div>
<?php }; ?>

<?php get_footer(); ?>
