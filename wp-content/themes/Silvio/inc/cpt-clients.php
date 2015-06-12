<?php

/* Clients Custom Post Type */

add_action('init', 'clients_register'); 

function clients_register() {  
	
	$labels = array(
		'name' => __( 'Clients', 'silver' ),
		'singular_name' => __( 'Client', 'silver' ),
		'add_new' => __( 'Add New Client', 'silver' ),
		'add_new_item' => __( 'Add New Client', 'silver' ),
		'edit_item' => __( 'Edit Client', 'silver' ),
		'new_item' => __( 'Add New Client', 'silver' ),
		'view_item' => __( 'View Client', 'silver' ),
		'search_items' => __( 'Search Clients', 'silver' ),
		'not_found' => __( 'No clients found', 'silver' ),
		'not_found_in_trash' => __( 'No clients found in trash', 'silver' )
	);
	
    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => array('slug' => 'clients'),
        'supports' => array('title', 'editor', 'thumbnail', 'comments')  
       );  
  
    register_post_type( 'clients' , $args );  
}  

?>