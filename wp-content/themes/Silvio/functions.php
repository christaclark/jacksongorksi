<?php

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_true' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'options/ot-loader.php' );

/**
 * Theme Options
 */
include_once( 'options/theme-options.php' );
include_once( 'options/meta-boxes.php' );
/**
 * Includes
 */
include_once('inc/cpt-portfolio.php');
include_once('inc/cpt-team.php');
include_once('inc/cpt-clients.php');

include_once('inc/widgets/blog.php');
include_once('inc/widgets/social.php');

include_once('inc/styles.php');
include_once('inc/scripts.php');
/**
 * Word Limiter
 */
function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}

function searchFilter($query) {
	if($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','searchFilter');


function the_title_trim($title) {
	$title = esc_attr($title);
	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);
	$replacewith = array(
		'<span class="hello">Welcome</span><br>', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');

/**
 * Thumbnails
 */

if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'folio-columns', 234, 182, true );
	add_image_size( 'folio-single', 395, 232, true );
	add_image_size( 'blog-thumb', 600, 210, true );
}
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'silver_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function silver_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'silver', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'silver' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // _s_setup
add_action( 'after_setup_theme', 'silver_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
/*function silver_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( '_s_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	}
}
add_action( 'after_setup_theme', 'silver_register_custom_background' );*/

/**
 * Register widgetized area and update sidebar with default widgets
 */
function silver_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'silver' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'silver_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function silver_scripts() {
	wp_enqueue_style( 'base', get_stylesheet_directory_uri() . '/stylesheets/base.css' );
	wp_enqueue_style( 'skeleton', get_stylesheet_directory_uri() . '/stylesheets/skeleton.css' );
	wp_enqueue_style( 'layout', get_stylesheet_directory_uri() . '/stylesheets/layout.css' );
	wp_enqueue_style( 'supersized', get_stylesheet_directory_uri() . '/stylesheets/supersized.css' );
	wp_enqueue_style( 'supersized', get_stylesheet_directory_uri() . '/stylesheets/supersized.css' );
	wp_enqueue_style( 'supersized.shutter', get_stylesheet_directory_uri() . '/stylesheets/supersized.shutter.css' );
	wp_enqueue_style( 'flexslider', get_stylesheet_directory_uri() . '/stylesheets/flexslider.css' );
	wp_enqueue_style( 'silvio-style', get_stylesheet_uri() );
	wp_enqueue_style( 'rufina', 'http://fonts.googleapis.com/css?family=Rufina:400,700' );
	wp_enqueue_style( 'noto-serif', 'http://fonts.googleapis.com/css?family=Noto+Serif:400,400italic' );
	wp_enqueue_style( 'roboto', 'http://fonts.googleapis.com/css?family=Roboto+Slab:300' );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'silver-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'silver-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'desaturate', get_template_directory_uri() . '/js/desaturate.js', array(), '20130710', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '20130710', true );
	wp_enqueue_script( 'supersized', get_template_directory_uri() . '/js/supersized.3.2.7.min.js', array(), '20130710', true );
	wp_enqueue_script( 'supersized.shutter', get_template_directory_uri() . '/js/supersized.shutter.min.js', array(), '20130710', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.js', array(), '20130710', true );
	wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), '20130710', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '20130710', true );
	wp_enqueue_script( 'jCarousel', get_template_directory_uri() . '/js/jCarousel.js', array(), '20130710', true );
	wp_enqueue_script( 'lava-lamp', get_template_directory_uri() . '/js/jquery.lavalamp.min.js', array(), '20130710', true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '20130710', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'silver-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'silver_scripts' );

/**
 * Automatic Plugin Activation
 */
require_once('inc/plugin-activation.php');

add_action('tgmpa_register', 'register_required_plugins');
function register_required_plugins() {
	$plugins = array(
		array(
			'name'     				=> 'Zilla Shortcodes', // The plugin name
			'slug'     				=> 'zilla-shortcodes', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/plugins/zilla-shortcodes.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Post Password Token',
			'slug'      => 'post-password-plugin',
			'required'  => false,
		),
		array(
			'name'      => 'MailChimp List Subscribe Form',
			'slug'      => 'mailchimp',
			'required'  => false,
		)
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'silver';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);
	tgmpa($plugins, $config);
}

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
