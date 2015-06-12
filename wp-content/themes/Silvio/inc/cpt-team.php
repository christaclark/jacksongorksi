<?php

/* Team Custom Post Type */

add_action('init', 'team_register'); 

function team_register() {  
	
	$labels = array(
		'name' => __( 'Team', 'silver' ),
		'singular_name' => __( 'Team Member', 'silver' ),
		'add_new' => __( 'Add New Member', 'silver' ),
		'add_new_item' => __( 'Add New Team Member', 'silver' ),
		'edit_item' => __( 'Edit Team Member', 'silver' ),
		'new_item' => __( 'Add New Team Member', 'silver' ),
		'view_item' => __( 'View Team Member', 'silver' ),
		'search_items' => __( 'Search Team', 'silver' ),
		'not_found' => __( 'No team members found', 'silver' ),
		'not_found_in_trash' => __( 'No team members found in trash', 'silver' )
	);
	
    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => array('slug' => 'team'),
        'supports' => array('title', 'editor', 'thumbnail', 'comments')  
       );  
  
    register_post_type( 'team' , $args );  
}  

?>