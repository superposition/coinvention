<?php
/**
 * prasoonpro Theme Customizer.
 *
 * @package prasoonpro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'prasoonpro_customize_register' ) ) :
function prasoonpro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';	
}
endif;
add_action( 'customize_register', 'prasoonpro_customize_register' );

