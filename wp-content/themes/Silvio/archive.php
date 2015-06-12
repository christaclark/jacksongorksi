<?php get_header(); ?>

<div class="page-content">
	
	<h4 class="arch-title">
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<?php _e('Category Archive for', 'silver') ?> &#8216;<?php single_cat_title(); ?>&#8217; 

		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<?php _e('Posts Tagged', 'silver') ?> &#8216;<?php single_tag_title(); ?>&#8217;

		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<?php _e('Archive for', 'silver') ?> <?php the_time('F jS, Y'); ?>

		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<?php _e('Archive for', 'silver') ?> <?php the_time('F, Y'); ?>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<?php _e('Archive for', 'silver') ?> <?php the_time('Y'); ?>

		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<?php _e('Author Archive', 'silver') ?>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<?php _e('Blog Archives', 'silver') ?>
		<?php } ?>
	</h4>
	
	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="page-title"><?php the_title(); ?><span><?php _e('by', 'silver'); ?> <?php the_author(); ?></span></h1>
			<?php the_content(); ?>
		</article>

	<?php endwhile; // end of the loop. ?>
	
</div>
<?php get_footer(); ?>
