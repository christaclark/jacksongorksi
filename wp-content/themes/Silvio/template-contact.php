<?php 

/* Template Name: Contact */

get_header(); ?>

<div class="page-content tpc">
	<?php
		$script = get_template_directory_uri() . '/js/jquery.gmap.min.js';
		$output = '
		
			<!-- Google Maps -->
			<div id="googlemaps" class="google-map google-map-full" style="height:300px;margin-right:16px;"></div>

			<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<script src="'.$script.'"></script>
		
			<script type="text/javascript">
				jQuery("#googlemaps").gMap({
					maptype: "ROADMAP",
					scrollwheel: true,
					zoom: 15,
					markers: [
						{
							address: "'.ot_get_option('caddress','New York, United States').'", // Your Adress Here
							html: "'.ot_get_option('cdesc','This is the map description').'",
							popup: true,
						}

					],
					
				});
			</script>';

		echo $output;
	?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article style="margin-right: 16px;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_content(); ?>
		</article>

	<?php endwhile; ?>
	
	<?php if(ot_get_option('cextrai') != '') { ?>
		<div class="cextrai">
			<img src="<?php echo get_template_directory_uri() ?>/images/envelope.png" />
			<div>
				<?php echo ot_get_option('cextrai'); ?>
			</div>
		</div>
	<?php }; ?>

</div>

<?php get_footer(); ?>
