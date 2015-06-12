<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'General',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => '<p>Sidebar content goes here!</p>'
    ),
    'sections'        => array(
      array(
        'title'       => 'General',
        'id'          => 'general'
      ),
	  array(
        'title'       => 'Contact',
        'id'          => 'contact'
      )
    ),
    'settings'        => array(
	  array(
        'label'       => 'Site author',
        'id'          => 'site-author',
        'type'        => 'text',
        'desc'        => 'Enter site owner for SEO.',
        'std'         => '',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
      array(
        'label'       => 'Logo',
        'id'          => 'logo',
        'type'        => 'upload',
        'desc'        => 'Upload site logo here.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	   array(
        'label'       => 'Site tags',
        'id'          => 'site-tags',
        'type'        => 'text',
        'desc'        => 'Enter site tags for seo.',
        'std'         => 'Ex: photography, design',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
      array(
        'label'       => 'Favicon',
        'id'          => 'favicon',
        'type'        => 'upload',
        'desc'        => 'Upload 16 by 16px favicon.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Apple icon',
        'id'          => 'apple-icon',
        'type'        => 'upload',
        'desc'        => 'Upload 16 by 16px apple icon.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Apple icon',
        'id'          => 'apple-icon-72',
        'type'        => 'upload',
        'desc'        => 'Upload 72 by 72px apple icon.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Apple icon',
        'id'          => 'apple-icon-114',
        'type'        => 'upload',
        'desc'        => 'Upload 114 by 114px apple icon.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Background slider and homepage quote',
        'id'          => 'bgq',
        'type'        => 'list-item',
        'desc'        => 'Add slides and quotes to the background slider and homepage quote slider.',
        'settings'    => array(
          array(
            'label'       => 'Image upload',
            'id'          => 'bgq-image',
            'type'        => 'upload',
            'desc'        => 'Upload image.',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'label'       => 'Quote',
            'id'          => 'bgq-quote',
            'type'        => 'textarea-simple',
            'desc'        => 'Add quote.',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  array(
            'label'       => 'Author',
            'id'          => 'bgq-author',
            'type'        => 'text',
            'desc'        => 'Add quote author.',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
		'label'       => 'Footer text',
		'id'          => 'footer-text',
		'type'        => 'text',
		'desc'        => 'Add footer text.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => 'general',
        'section'     => 'general'
	  ),
	  array(
        'label'       => 'Buttons color',
        'id'          => 'bc',
        'type'        => 'colorpicker',
        'desc'        => 'Change the black button color.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Buttons hover color',
        'id'          => 'bhc',
        'type'        => 'colorpicker',
        'desc'        => 'Change the button hover color.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Footer text color',
        'id'          => 'fdiv',
        'type'        => 'colorpicker',
        'desc'        => 'Change the footer text color.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Progress bar color',
        'id'          => 'pbb',
        'type'        => 'colorpicker',
        'desc'        => 'Change the progress bar color.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Blog page title',
        'id'          => 'bpn',
        'type'        => 'text',
        'desc'        => 'Enter blog page title here. It defaults to Blog',
        'std'         => '',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
        'label'       => 'Clients page title',
        'id'          => 'cpn',
        'type'        => 'text',
        'desc'        => 'Enter clients page title here. It defaults to Clients',
        'std'         => '',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  array(
		'label'       => 'Custom CSS',
		'id'          => 'ccss',
		'type'        => 'textarea-simple',
		'desc'        => 'Add all your custom css styles. They will override any theme styles.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'general'
	  ),
	  array(
		'label'       => 'Map Address',
		'id'          => 'caddress',
		'type'        => 'text',
		'desc'        => 'Enter google map address.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'contact'
	  ),
	  array(
		'label'       => 'Map desc',
		'id'          => 'cdesc',
		'type'        => 'textarea-simple',
		'desc'        => 'Enter google map description.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'contact'
	  ),
	  array(
		'label'       => 'Contact extra info',
		'id'          => 'cextrai',
		'type'        => 'textarea-simple',
		'desc'        => 'Add contact footer extra info.',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'contact'
	  )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}