<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', '_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box = array(
    'id'          => 'my_meta_box',
    'title'       => 'Team',
    'desc'        => '',
    'pages'       => array( 'team' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
		'label'       => 'Team member email',
		'id'          => 'sm_link',
		'type'        => 'text',
		'desc'        => 'Enter team member email.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => ''
	  )
  	)
  );
  
  $my_meta_box02 = array(
    'id'          => 'my_meta_box02',
    'title'       => 'Clients',
    'desc'        => '',
    'pages'       => array( 'clients' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
		'label'       => 'Client Address',
		'id'          => 'cl_address',
		'type'        => 'text',
		'desc'        => 'Enter client address.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => ''
	  ),
	  array(
        'label'       => 'Upload document',
        'id'          => 'upload_doc',
        'type'        => 'upload',
        'desc'        => 'Upload document here.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => ''
      )
  	)
  );
  
  $my_meta_box03 = array(
    'id'          => 'my_meta_box03',
    'title'       => 'Folio',
    'desc'        => '',
    'pages'       => array( 'portfolio' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
		'label'       => 'Youtube',
		'id'          => 'silver_youtube',
		'type'        => 'text',
		'desc'        => 'Enter youtube clip id.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => ''
	  ),
	  array(
		'label'       => 'Vimeo',
		'id'          => 'silver_vimeo',
		'type'        => 'text',
		'desc'        => 'Enter vimeo clip id.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => ''
	  )
  	)
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $my_meta_box );
  ot_register_meta_box( $my_meta_box02 );
  ot_register_meta_box( $my_meta_box03 );

}