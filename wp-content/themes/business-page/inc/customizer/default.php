<?php
/**
 * Default theme options.
 *
 * @package Business_Page
 */

if ( ! function_exists( 'business_page_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function business_page_get_default_theme_options() {

	$defaults = array();

	// Menu Section
	$defaults['enable_home_link']			= true;
	$defaults['enable_single_menu']			= true;
	$defaults['menu_single_title']			= esc_html__('Home','business-page');

	//Home Page Section Default
	$defaults['slider_category']	   	 	= 0; 	
	$defaults['disable_slider_section']		= true;
	$defaults['slider_number']				= 3;
	$defaults['slider_layout']				= 'slider';
	$defaults['banner_image']				= '';
	$defaults['slider_button_title']		= esc_html__('Contact Us','business-page');
	$defaults['slider_button_url']			= '';	

	//About Us Section	
	$defaults['disable_about_section']	   	= true;
	$defaults['about_menu_title']	   	 	= esc_html__( 'About Us', 'business-page' );
	$defaults['about_title']	   	 		= esc_html__( 'About Us', 'business-page' );
	$defaults['icon_first']	   				= '';
	$defaults['about_first']	   			= 0;
	$defaults['icon_second']	   			= '';
	$defaults['about_second']	   			= 0;
	$defaults['icon_third']	   				= '';
	$defaults['about_third']	   			= 0;

	// Our Service Section
	$defaults['disable_service_section']	= true;
	$defaults['service_menu_title']	   	 	= esc_html__( 'Service', 'business-page' );
	$defaults['service_title']	   	 		= esc_html__( 'Our Service', 'business-page' );
	$defaults['service_category']	   		= 0;
	$defaults['service_number']				= 6;

	// Our Work Section
	$defaults['disable_work_section']		= true;
	$defaults['work_menu_title']	   	 	= esc_html__( 'Our Work', 'business-page' );
	$defaults['work_title']	   	 			= esc_html__( 'OUR Awesome Work', 'business-page' );
	$defaults['work_category']	   			= 1; 

	// Our Testimonial Section
	$defaults['disable_testimonial_section']= true;
	$defaults['testimonial_title']	   	 	= esc_html__( 'What people are saying', 'business-page' );
	$defaults['testimonial_category']	   	= 0; 
	$defaults['testimonial_number']			= 3;

	// Blog Section
	$defaults['disable_blog_section']		= true;
	$defaults['blog_menu_title']	   	 	= esc_html__( 'Blog', 'business-page' );
	$defaults['blog_title']	   	 			= esc_html__( 'From Blogs', 'business-page' );
	$defaults['blog_category']	   			= 0; 
	$defaults['blog_number']				= 3;

	// Client Section
	$defaults['disable_client_section']		= true;
	$defaults['client_category']	   		= 0;

	// Client Section
	$defaults['disable_contact_section']	= true;
	$defaults['contact_menu_title']	   	 	= esc_html__( 'Contact', 'business-page' );
	$defaults['contact_title']	   	 		= esc_html__( 'Contact Us', 'business-page' );
	$defaults['contact_form']				= '';
	$defaults['contact_icon_1']				= '';
	$defaults['contact_icon_2']				= '';
	$defaults['contact_icon_3']				= '';
	$defaults['contact_title_1']	   	 	= esc_html__( 'Phone', 'business-page' );
	$defaults['contact_title_2']	   	 	= esc_html__( 'Email', 'business-page' );
	$defaults['contact_title_3']	   	 	= esc_html__( 'Address', 'business-page' );
	$defaults['contact_address_1']	   	 	= '';
	$defaults['contact_address_2']	   	 	= '';
	$defaults['contact_address_3']	   	 	= '';

	//General Section
	$defaults['readmore_text']				= esc_html__('Read More','business-page');
	$defaults['layout_options']				= 'right';	

	//footer section
	$defaults['facebook']					= '';
	$defaults['twitter']					= '';
	$defaults['google_plus']				= '';
	$defaults['pinterest']					= '';
	$defaults['linkedin']					= '';	 		
	$defaults['enable_top_footer']			= true;
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'business-page' );
	$defaults['enable_social_footer']		= false;

	// Pass through filter.
	$defaults = apply_filters( 'business_page_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'business_page_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function business_page_get_option( $key ) {

		$default_options = business_page_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;