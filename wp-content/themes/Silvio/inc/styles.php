<?php
function custom_styles() {
?>

<style>

.button, button, input[type="submit"], input[type="reset"], input[type="button"] { background: <?php echo ot_get_option('bc', '#000') ?>; }
.button:hover, button:hover, input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover { background: <?php echo ot_get_option('bhc', '#0d4470') ?>; }
.fdiv p { color: <?php echo ot_get_option('fdiv', '#666666') ?>; }
#progress-bar { background: <?php echo ot_get_option('pbb', 'rgba(255,255,255,0.25)') ?> !important; }

<?php echo ot_get_option('ccss') ?>

</style>

<?php }
add_action('wp_head', 'custom_styles', 22);
?>