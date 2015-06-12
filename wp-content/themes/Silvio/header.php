<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<?php if(ot_get_option('site-author') != "") echo '<meta name="author" content="'.ot_get_option('site-author').'">'; ?>
<?php if(ot_get_option('site-tags') != "") echo '<meta name="keywords" content="'.ot_get_option('site-tags').'">'; ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Favicons
================================================== -->

<?php if( ot_get_option( 'favicon' )); ?><link rel="shortcut icon" href="<?php echo ot_get_option( 'favicon' ); ?>">

<?php if(ot_get_option('favicon') != "") echo '<link rel="shortcut icon" href="'.ot_get_option('favicon').'">'; ?>
<?php if(ot_get_option('apple-icon') != "") echo '<link rel="apple-touch-icon" href="'.ot_get_option('apple-icon').'">'; ?>
<?php if(ot_get_option('apple-icon-72') != "") echo '<link rel="apple-touch-icon" sizes="72x72" href="'.ot_get_option('apple-icon-72').'">'; ?>
<?php if(ot_get_option('apple-icon-114') != "") echo '<link rel="apple-touch-icon" sizes="114x114" href="'.ot_get_option('apple-icon-114').'">'; ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="home-container <?php if(!is_page_template('template-team.php') && !is_front_page()) echo 'page '; if(is_page_template('template-portfolio.php') || is_page_template('template-contact.php')) echo 'hctp '; ?>clearfix">
	<?php if(is_front_page()) echo '<div class="hnav"><a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a></div>'; ?>

	<?php echo ot_get_option('logo') != "" ? '<a class="slink" href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home"><img class="slogo" src="'.ot_get_option('logo').'" /></a>' : '<h1 class="logo"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1><h2 class="site-desc">'.get_bloginfo( 'description' ).'</h2>'; ?>

	<img class="mobile_menu" src="<?php echo get_template_directory_uri() ?>/images/mobile_menu.png"/>
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	
	<?php if(is_page_template('template-portfolio.php') || is_singular('portfolio')) echo '<h1 class="header page-title">'.ot_get_option('cpn', 'Clients').'</h1>'; ?>
	<?php if(is_home()) echo '<h1 class="header page-title">'.ot_get_option('bpn', 'Blog').'</h1>'; ?>
	<?php if(is_page_template('template-contact.php')) echo '<h1 class="header page-title">'.get_the_title().'</h1>'; ?>
	
	<?php if(is_front_page() || is_page_template('template-team.php')) echo '<div class="quote"><div id="slidecaption"></div></div>'; ?>

</div>