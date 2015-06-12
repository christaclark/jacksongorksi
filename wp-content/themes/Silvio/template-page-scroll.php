<?php 

/* Template Name: Page with Scrollbar */

get_header(); ?>

<?php if(!is_front_page()) { ?>
<div class="page-content">
	
	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="page-title"><?php the_title(); ?><span><?php _e('by', 'silver'); ?> <?php the_author(); ?></span></h1>
			<div id="scroller" style="height: 435px; padding-right: 40px; overflow: hidden;" >
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'silver' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</article>

	<?php endwhile; // end of the loop. ?>
	
</div>
<?php }; ?>

<?php get_footer(); ?>
