<?php get_header(); ?>

<div class="page-content">
	
	<h4 class="error"> <?php _e('NOTHING FOUND', 'silver'); ?> </h4>
	<p>
		<?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'silver'); ?> 
		<a href="javascript:history.back();">
			<?php _e('GO BACK', 'silver'); ?>
		</a>
	</p>
	
</div>
<?php get_footer(); ?>
