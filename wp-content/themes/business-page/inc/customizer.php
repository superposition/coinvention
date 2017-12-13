<?php
/**
 * Business Page Theme Customizer
 *
 * @package Business_Page
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_page_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load header menu  sections option.
	include get_template_directory() . '/inc/customizer/menu-section.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-section.php';

	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';
}
add_action( 'customize_register', 'business_page_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_page_customize_preview_js() {
	wp_enqueue_script( 'business_page_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_page_customize_preview_js' );
/**
 *
 */
function business_page_customize_backend_scripts() {

	wp_enqueue_style( 'business-page-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'business-page-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scipt.js', array( ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'business_page_customize_backend_scripts', 10 );
