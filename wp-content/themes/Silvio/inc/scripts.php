<?php
function custom_scripts() {
?>

<?php $output = '<script type="text/javascript">jQuery(function($){ $.supersized({ slide_interval : 6000, transition : 1, transition_speed : 700, slide_links : \'blank\', slides : ['; $slides = ot_get_option( 'bgq', array() ); if ( ! empty( $slides ) ) { foreach( $slides as $slide ) { $output .= "{ image : '".$slide['bgq-image']."', title : '".htmlspecialchars($slide['bgq-quote'], ENT_QUOTES)." <span class=\"author\">".htmlspecialchars($slide['bgq-author'], ENT_QUOTES)."</span>' },"; }; }; $output .= ' ] }); });'; if(is_page_template('template-team.php')) $output .= 'jQuery(\'.flex\').flexslider({ animation: "slide", animationLoop: false, itemWidth: 234, itemMargin: 16, controlNav: false, move: 1 });'; $output .= '</script>'; $output = str_replace ("\r\n", '<br>', $output); $output = str_replace (", ] }); });</script>", " ] }); });</script>", $output); echo $output; ?>

<?php }
add_action('wp_footer', 'custom_scripts', 21);
?>