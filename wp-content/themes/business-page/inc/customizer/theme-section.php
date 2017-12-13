<?php
/**
 * Header Options.
 *
 * @package Business_Page
 */

$default = business_page_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'business-page' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

//For General Option
$wp_customize->add_section('section_general', array(    
'title'       => __('General Option', 'business-page'),
'panel'       => 'theme_option_panel'    
));

//Layout Options
$wp_customize->add_setting('theme_options[layout_options]', 
	array(
	'default' 			=> $default['layout_options'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_select'
	)
);

$wp_customize->add_control(new Business_Page_Image_Radio_Control($wp_customize, 'theme_options[layout_options]', 
	array(		
	'label' 	=> __('Layout Options', 'business-page'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left' 			=> get_template_directory_uri() . '/images/left-sidebar.png',						
		'right' 		=> get_template_directory_uri() . '/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/images/no-sidebar.png',
		),	
	))
);

// Setting Read More Text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
	'default'           => $default['readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
	'label'    => __( ' Read More Text', 'business-page' ),
	'section'  => 'section_general',
	'type'     => 'text',
	'priority' => 100,
	)
);

//For Social Option
$wp_customize->add_section('section_social', array(    
'title'       => __('Social Links', 'business-page'),
'panel'       => 'theme_option_panel'    
));

//Social link text field
$social_options = array('facebook', 'twitter', 'google_plus', 'pinterest', 'linkedin' );

foreach($social_options as $social) {

$social_name = ucwords(str_replace('_', ' ', $social));

$label = '';

switch ($social) {

case 'facebook':
$label = __('Facebook', 'business-page');
break;

case 'twitter':
$label = __( 'Twitter', 'business-page' );
break;

case 'google_plus':
$label = __( 'Google Plus', 'business-page' );
break;

case 'pinterest':
$label = __( 'Pinterest', 'business-page' );
break;

case 'linkedin':
$label = __( 'LinkedIn', 'business-page' );
break;

}

$wp_customize->add_setting( 'theme_options['.$social.']', array(
'sanitize_callback'     => 'esc_url_raw',
'sanitize_js_callback'  =>  'esc_url'
));

$wp_customize->add_control( 'theme_options['.$social.']', array(
'label'     => $label,
'type'      => 'url',
'section'   => 'section_social',
'settings'  => 'theme_options['.$social.']'
));
}

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Setting', 'business-page'),
	'panel'       => 'theme_option_panel'    
	)
);

// Enable Top Footer Section
$wp_customize->add_setting('theme_options[enable_social_footer]', 
	array(
	'default' 			=> $default['enable_social_footer'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_social_footer]', 
	array(		
	'label' 	=> __('Enable Social Icon Section', 'business-page'),
	'section' 	=> 'section_footer',
	'settings'  => 'theme_options[enable_social_footer]',
	'type' 		=> 'checkbox',	
	)
);

// Enable Top Footer Section
$wp_customize->add_setting('theme_options[enable_top_footer]', 
	array(
	'default' 			=> $default['enable_top_footer'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_top_footer]', 
	array(		
	'label' 	=> __('Enable top footer section ', 'business-page'),
	'section' 	=> 'section_footer',
	'settings'  => 'theme_options[enable_top_footer]',
	'type' 		=> 'checkbox',	
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'business-page' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);