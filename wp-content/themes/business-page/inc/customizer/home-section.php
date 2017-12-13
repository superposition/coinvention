<?php
/**
 * Home Page Options.
 *
 * @package Business Page
 */

$default = business_page_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Home Section Options', 'business-page' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);
// Slider Section.
$wp_customize->add_section( 'section_home_slider',
	array(
		'title'      => __( 'Slider Setting', 'business-page' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Slider Section
$wp_customize->add_setting('theme_options[disable_slider_section]', 
	array(
	'default' 			=> $default['disable_slider_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_slider_section]', 
	array(		
	'label' 	=> __('Disable Slider Section', 'business-page'),
	'section' 	=> 'section_home_slider',
	'settings'  => 'theme_options[disable_slider_section]',
	'type' 		=> 'checkbox',	
	)
);

// Slider type
$wp_customize->add_setting('theme_options[slider_layout]', 
    array(
        'default'           => $default['slider_layout'],        
        'sanitize_callback' => 'business_page_sanitize_select'
    )
);

$wp_customize->add_control(
    'theme_options[slider_layout]', 
    array(      
        'label'     => __('Select slider type', 'business-page'),
        'section'   => 'section_home_slider',
        'settings'  => 'theme_options[slider_layout]',
        'type'      => 'radio',
        'choices'   => array(
            'slider'  => __('Slider', 'business-page'),
            'banner'  => __('Banner Image', 'business-page'),              
        ),
    )
);

// Setting slider_category.
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(
	'default'           => $default['slider_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Business_Page_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => __( 'Select Category', 'business-page' ),
		'section'  => 'section_home_slider',
		'settings' => 'theme_options[slider_category]',
		'active_callback'   => 'business_page_slider_layout',
		'priority' => 100,
		)
	)
);

// Slider Number.
$wp_customize->add_setting( 'theme_options[slider_number]',
	array(
		'default'           => $default['slider_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_page_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[slider_number]',
	array(
		'label'       => __( 'No of Slider', 'business-page' ),
		'section'     => 'section_home_slider',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 5, 'step' => 1, 'style' => 'width: 115px;' ),
		'active_callback'   => 'business_page_slider_layout',
	)
);

// Banner Image
$wp_customize->add_setting('theme_options[banner_image]', 
	array(
	'default'           => $default['banner_image'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'business_page_sanitize_number',
	)
);

$wp_customize->add_control('theme_options[banner_image]', 
	array(
	'label'       => __('Banner Image', 'business-page'),
	'description' => __( 'Enter the ID of post to use as a banner image.', 'business-page' ), 
	'section'     => 'section_home_slider',   
	'settings'    => 'theme_options[banner_image]',		
	'type'        => 'text',	
	'active_callback'   => 'business_page_slider_layout_banner',	
	)
);
// Button title
$wp_customize->add_setting('theme_options[slider_button_title]', 
	array(
	'default'           => $default['slider_button_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[slider_button_title]', 
	array(
	'label'       => __('Button Title', 'business-page'),
	'section'     => 'section_home_slider',   
	'settings'    => 'theme_options[slider_button_title]',		
	'type'        => 'text',
	'priority'   => 100,	
	)
);
// Button Url
$wp_customize->add_setting( 'theme_options[slider_button_url]', 
	array(
	'sanitize_callback'     => 'esc_url_raw',
	'sanitize_js_callback'  =>  'esc_url_raw'
	)
);

$wp_customize->add_control( 'theme_options[slider_button_url]', 
	array(
	'label'     => __('Button Url','business-page'),
	'type'      => 'url',
	'section'   => 'section_home_slider',
	'settings'  => 'theme_options[slider_button_url]',
	'priority'   => 100,
	)
);

/********************** About Section. *************************************/
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'About Section Setting', 'business-page' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable About Section
$wp_customize->add_setting('theme_options[disable_about_section]', 
	array(
	'default' 			=> $default['disable_about_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_about_section]', 
	array(		
	'label' 	=> __('Disable About Section', 'business-page'),
	'section' 	=> 'section_home_about',
	'settings'  => 'theme_options[disable_about_section]',
	'type' 		=> 'checkbox',	
	)
);
// Menu title
$wp_customize->add_setting('theme_options[about_menu_title]', 
	array(
	'default'           => $default['about_menu_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[about_menu_title]', 
	array(
	'label'       => __('Menu Title', 'business-page'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_menu_title]',		
	'type'        => 'text'
	)
);
//About Section  title
$wp_customize->add_setting('theme_options[about_title]', 
	array(
	'default'           => $default['about_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[about_title]', 
	array(
	'label'       => __('Section Title', 'business-page'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_title]',		
	'type'        => 'text'
	)
);
// Icon for First Page
$wp_customize->add_setting('theme_options[icon_first]', 
	array(
	'default'           => $default['icon_first'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[icon_first]', 
	array(
	'label'       => __('Icon for First Page', 'business-page'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[icon_first]',		
	'type'        => 'text'
	)
);
// About Us First Page
$wp_customize->add_setting('theme_options[about_first]', 
	array(
	'default'           => $default['about_first'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'business_page_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[about_first]', 
	array(
	'label'       => __('Select First Page', 'business-page'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_first]',		
	'type'        => 'dropdown-pages'
	)
);

// Icon for Second Page
$wp_customize->add_setting('theme_options[icon_second]', 
	array(
	'default'           => $default['icon_second'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[icon_second]', 
	array(
	'label'       => __('Icon for Second Page', 'business-page'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[icon_second]',		
	'type'        => 'text'
	)
);
// About Us Second Page
$wp_customize->add_setting('theme_options[about_second]', 
	array(
	'default'           => $default['about_second'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'business_page_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[about_second]', 
	array(
	'label'       => __('Select Second Page', 'business-page'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_second]',		
	'type'        => 'dropdown-pages'
	)
);

// Icon for Third Page
$wp_customize->add_setting('theme_options[icon_third]', 
	array(
	'default'           => $default['icon_third'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[icon_third]', 
	array(
	'label'       => __('Icon for Third Page', 'business-page'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[icon_third]',		
	'type'        => 'text'
	)
);
// About Us Third Page
$wp_customize->add_setting('theme_options[about_third]', 
	array(
	'default'           => $default['about_third'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'business_page_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[about_third]', 
	array(
	'label'       => __('Select Third Page', 'business-page'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_third]',		
	'type'        => 'dropdown-pages'
	)
);

/********************** Service Section. *************************************/
$wp_customize->add_section( 'section_home_service',
	array(
		'title'      => __( 'Service Section Setting', 'business-page' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Service Section
$wp_customize->add_setting('theme_options[disable_service_section]', 
	array(
	'default' 			=> $default['disable_service_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_service_section]', 
	array(		
	'label' 	=> __('Disable Service Section', 'business-page'),
	'section' 	=> 'section_home_service',
	'settings'  => 'theme_options[disable_service_section]',
	'type' 		=> 'checkbox',	
	)
);
// Menu title
$wp_customize->add_setting('theme_options[service_menu_title]', 
	array(
	'default'           => $default['service_menu_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[service_menu_title]', 
	array(
	'label'       => __('Menu Title', 'business-page'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_menu_title]',		
	'type'        => 'text'
	)
);
//Service Section  title
$wp_customize->add_setting('theme_options[service_title]', 
	array(
	'default'           => $default['service_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[service_title]', 
	array(
	'label'       => __('Section Title', 'business-page'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_title]',		
	'type'        => 'text'
	)
);

// Setting  Service category.
$wp_customize->add_setting( 'theme_options[service_category]',
	array(
	'default'           => $default['service_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Business_Page_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[service_category]',
		array(
		'label'    => __( 'Select Category', 'business-page' ),
		'section'  => 'section_home_service',
		'settings' => 'theme_options[service_category]',		
		'priority' => 100,
		)
	)
);
$wp_customize->add_setting( 'theme_options[service_number]',
	array(
		'default'           => $default['service_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_page_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[service_number]',
	array(
		'label'       => __( 'Number For Blog', 'business-page' ),
		'section'     => 'section_home_service',
		'settings' => 'theme_options[service_number]',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 2, 'max' => 8, 'step' => 2, 'style' => 'width: 115px;' ),
		
	)
);
/********************** Work Section. *************************************/
$wp_customize->add_section( 'section_home_work',
	array(
		'title'      => __( 'Work Section Setting', 'business-page' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Work Section
$wp_customize->add_setting('theme_options[disable_work_section]', 
	array(
	'default' 			=> $default['disable_work_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_work_section]', 
	array(		
	'label' 	=> __('Disable Work Section', 'business-page'),
	'section' 	=> 'section_home_work',
	'settings'  => 'theme_options[disable_work_section]',
	'type' 		=> 'checkbox',	
	)
);
// Menu title
$wp_customize->add_setting('theme_options[work_menu_title]', 
	array(
	'default'           => $default['work_menu_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[work_menu_title]', 
	array(
	'label'       => __('Menu Title', 'business-page'),
	'section'     => 'section_home_work',   
	'settings'    => 'theme_options[work_menu_title]',		
	'type'        => 'text'
	)
);
//Service Section  title
$wp_customize->add_setting('theme_options[work_title]', 
	array(
	'default'           => $default['work_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[work_title]', 
	array(
	'label'       => __('Work Title', 'business-page'),
	'section'     => 'section_home_work',   
	'settings'    => 'theme_options[work_title]',		
	'type'        => 'text'
	)
);
// Setting  Testimonial Category.
$wp_customize->add_setting( 'theme_options[work_category]',
	array(
	'default'           => $default['work_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Business_Page_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[work_category]',
		array(
		'label'    => __( 'Select Category', 'business-page' ),
		'section'  => 'section_home_work',
		'settings' => 'theme_options[work_category]',		
		'priority' => 100,
		)
	)
);
/********************** Testimonial Section. *************************************/
$wp_customize->add_section( 'section_home_testimonial',
	array(
		'title'      => __( 'Testimonial Section Setting', 'business-page' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Testimonial Section
$wp_customize->add_setting('theme_options[disable_testimonial_section]', 
	array(
	'default' 			=> $default['disable_testimonial_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_testimonial_section]', 
	array(		
	'label' 	=> __('Disable Testimonial Section', 'business-page'),
	'section' 	=> 'section_home_testimonial',
	'settings'  => 'theme_options[disable_testimonial_section]',
	'type' 		=> 'checkbox',	
	)
);
//Service Testimonial  title
$wp_customize->add_setting('theme_options[testimonial_title]', 
	array(
	'default'           => $default['testimonial_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[testimonial_title]', 
	array(
	'label'       => __('Testimonial Title', 'business-page'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[testimonial_title]',		
	'type'        => 'text'
	)
);
// Setting  Testimonial Category.
$wp_customize->add_setting( 'theme_options[testimonial_category]',
	array(
	'default'           => $default['testimonial_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Business_Page_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[testimonial_category]',
		array(
		'label'    => __( 'Select Category', 'business-page' ),
		'section'  => 'section_home_testimonial',
		'settings' => 'theme_options[testimonial_category]',		
		'priority' => 100,
		)
	)
);

// Testimonial Number.
$wp_customize->add_setting( 'theme_options[testimonial_number]',
	array(
		'default'           => $default['testimonial_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_page_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[testimonial_number]',
	array(
		'label'       => __( 'Number For Testimonial', 'business-page' ),
		'section'     => 'section_home_testimonial',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 3, 'max' => 10, 'step' => 1, 'style' => 'width: 115px;' ),
		
	)
);
/********************** Blog Section. *************************************/
$wp_customize->add_section( 'section_home_blog',
	array(
		'title'      => __( 'Blog Section Setting', 'business-page' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Blog Section
$wp_customize->add_setting('theme_options[disable_blog_section]', 
	array(
	'default' 			=> $default['disable_blog_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_blog_section]', 
	array(		
	'label' 	=> __('Disable Blog Section', 'business-page'),
	'section' 	=> 'section_home_blog',
	'settings'  => 'theme_options[disable_blog_section]',
	'type' 		=> 'checkbox',	
	)
);
//Menu title
$wp_customize->add_setting('theme_options[blog_menu_title]', 
	array(
	'default'           => $default['blog_menu_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_menu_title]', 
	array(
	'label'       => __('Menu Title', 'business-page'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_menu_title]',		
	'type'        => 'text'
	)
);
//Service Blog title
$wp_customize->add_setting('theme_options[blog_title]', 
	array(
	'default'           => $default['blog_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_title]', 
	array(
	'label'       => __('Blog Title', 'business-page'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_title]',		
	'type'        => 'text'
	)
);
// Setting  Blog Category.
$wp_customize->add_setting( 'theme_options[blog_category]',
	array(
	'default'           => $default['blog_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Business_Page_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[blog_category]',
		array(
		'label'    => __( 'Select Category', 'business-page' ),
		'section'  => 'section_home_blog',
		'settings' => 'theme_options[blog_category]',		
		'priority' => 100,
		)
	)
);

// Blog Number.
$wp_customize->add_setting( 'theme_options[blog_number]',
	array(
		'default'           => $default['blog_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_page_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[blog_number]',
	array(
		'label'       => __( 'Number For Blog', 'business-page' ),
		'section'     => 'section_home_blog',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 3, 'max' => 9, 'step' => 3, 'style' => 'width: 115px;' ),
		
	)
);
/********************** Client Section. *************************************/
$wp_customize->add_section( 'section_home_client',
	array(
		'title'      => __( 'Client Section Setting', 'business-page' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Client Section
$wp_customize->add_setting('theme_options[disable_client_section]', 
	array(
	'default' 			=> $default['disable_client_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_client_section]', 
	array(		
	'label' 	=> __('Disable Client Section', 'business-page'),
	'section' 	=> 'section_home_client',
	'settings'  => 'theme_options[disable_client_section]',
	'type' 		=> 'checkbox',	
	)
);
// Setting Client Category.
$wp_customize->add_setting( 'theme_options[client_category]',
	array(
	'default'           => $default['client_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Business_Page_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[client_category]',
		array(
		'label'    => __( 'Select Category', 'business-page' ),
		'section'  => 'section_home_client',
		'settings' => 'theme_options[client_category]',		
		'priority' => 100,
		)
	)
);
/********************** Contact Section. *************************************/
$wp_customize->add_section( 'section_home_contact',
	array(
		'title'      => __( 'Contact Section Setting', 'business-page' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Contact Section
$wp_customize->add_setting('theme_options[disable_contact_section]', 
	array(
	'default' 			=> $default['disable_contact_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'business_page_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_contact_section]', 
	array(		
	'label' 	=> __('Disable Contact Section', 'business-page'),
	'section' 	=> 'section_home_contact',
	'settings'  => 'theme_options[disable_contact_section]',
	'type' 		=> 'checkbox',	
	)
);
//Menu title
$wp_customize->add_setting('theme_options[contact_menu_title]', 
	array(
	'default'           => $default['contact_menu_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_menu_title]', 
	array(
	'label'       => __('Menu Title', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_menu_title]',		
	'type'        => 'text'
	)
);
//Contact title
$wp_customize->add_setting('theme_options[contact_title]', 
	array(
	'default'           => $default['contact_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_title]', 
	array(
	'label'       => __('Contact Title', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_title]',		
	'type'        => 'text'
	)
);
// Contact Form
$wp_customize->add_setting('theme_options[contact_form]', 
	array(
	'default'           => $default['contact_form'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'wp_kses_post'
	)
);

$wp_customize->add_control('theme_options[contact_form]', 
	array(
	'label'       => __('Contact Section Contact Form', 'business-page'),
	'description' => __( 'Enter the Contact Form 7 Shortcode. Ex. [contact-form-7 id="186" title="Google contact"]', 'business-page' ),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_form]',		
	'type'        => 'text'
	)
);
//Icon 1
$wp_customize->add_setting('theme_options[contact_icon_1]', 
	array(
	'default'           => $default['contact_icon_1'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_icon_1]', 
	array(
	'label'       => __('Icon 1', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_icon_1]',		
	'type'        => 'text'
	)
);
//Icon 2
$wp_customize->add_setting('theme_options[contact_icon_2]', 
	array(
	'default'           => $default['contact_icon_2'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_icon_2]', 
	array(
	'label'       => __('Icon 2', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_icon_2]',		
	'type'        => 'text'
	)
);
//Icon 3
$wp_customize->add_setting('theme_options[contact_icon_3]', 
	array(
	'default'           => $default['contact_icon_3'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_icon_3]', 
	array(
	'label'       => __('Icon 3', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_icon_3]',		
	'type'        => 'text'
	)
);
//Conact Title 1
$wp_customize->add_setting('theme_options[contact_title_1]', 
	array(
	'default'           => $default['contact_title_1'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_title_1]', 
	array(
	'label'       => __('Title 1', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_title_1]',		
	'type'        => 'text'
	)
);
//Conact Title 2
$wp_customize->add_setting('theme_options[contact_title_2]', 
	array(
	'default'           => $default['contact_title_2'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_title_2]', 
	array(
	'label'       => __('Title 2', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_title_2]',		
	'type'        => 'text'
	)
);
//Conact Title 3
$wp_customize->add_setting('theme_options[contact_title_3]', 
	array(
	'default'           => $default['contact_title_3'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_title_3]', 
	array(
	'label'       => __('Title 3', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_title_3]',		
	'type'        => 'text'
	)
);

// Contact Number
$wp_customize->add_setting('theme_options[contact_address_1]', 
	array(
	'default'           => $default['contact_address_1'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_address_1]', 
	array(
	'label'       => __('Contact Number', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_address_1]',		
	'type'        => 'text'
	)
);
// Contact Email
$wp_customize->add_setting('theme_options[contact_address_2]', 
	array(
	'default'           => $default['contact_address_2'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_email'
	)
);

$wp_customize->add_control('theme_options[contact_address_2]', 
	array(
	'label'       => __('Contact Email', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_address_2]',		
	'type'        => 'text'
	)
);
// Contact Address
$wp_customize->add_setting('theme_options[contact_address_3]', 
	array(
	'default'           => $default['contact_address_3'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[contact_address_3]', 
	array(
	'label'       => __('Contact Address', 'business-page'),
	'section'     => 'section_home_contact',   
	'settings'    => 'theme_options[contact_address_3]',		
	'type'        => 'text'
	)
);
