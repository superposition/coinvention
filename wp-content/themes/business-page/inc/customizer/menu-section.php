<?php
/**
 * Menu Options.
 *
 * @package Business_Page
 */

$default = business_page_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'menu_option_panel',
	array(
	'title'      => __( 'Menu Options', 'business-page' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);
//Top Menu Setting
$wp_customize->add_section('section_menu', array(    
'title'       => __('Top Menu Setting', 'business-page'),
'panel'       => 'menu_option_panel'    
));
// Enable Home Link
$wp_customize->add_setting('theme_options[enable_home_link]', 
	array(
	'default' 			=> $default['enable_home_link'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_home_link]', 
	array(		
	'label' 	=> __('Enable Home Link', 'business-page'),
	'section' 	=> 'section_menu',
	'settings'  => 'theme_options[enable_home_link]',
	'type' 		=> 'checkbox',	
	)
);
// Enable Single Page Menu
$wp_customize->add_setting('theme_options[enable_single_menu]', 
	array(
	'default' 			=> $default['enable_single_menu'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_single_menu]', 
	array(		
	'label' 	=> __('Enable Single Page Menu', 'business-page'),
	'section' 	=> 'section_menu',
	'settings'  => 'theme_options[enable_single_menu]',
	'type' 		=> 'checkbox',	
	)
);
// Menu title
$wp_customize->add_setting('theme_options[menu_single_title]', 
	array(
	'default'           => $default['menu_single_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[menu_single_title]', 
	array(
	'label'       => __('Menu Title', 'business-page'),
	'section'     => 'section_menu',   
	'settings'    => 'theme_options[menu_single_title]',		
	'type'        => 'text'
	)
);