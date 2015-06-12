<?php get_header(); ?>

<div class="page-content">
	
	<h4 class="arch-title"><?php _e('Search Results for', 'silver') ?><?php echo ' "'.$s.'"'; ?></h4>
	
	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="page-title"><?php the_title(); ?><span><?php _e('by', 'silver'); ?> <?php the_author(); ?></span></h1>
			<p><?php echo limit_words( get_the_excerpt(), '30' ) ?></p>
		</article>

	<?php endwhile; // end of the loop. ?>
	
	<div class="sidebar-container">
		<?php get_sidebar(); ?>
	</div>
	
</div>
<?php get_footer(); ?>
