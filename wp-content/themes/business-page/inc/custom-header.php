<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Business_Page
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses business_page_header_style()
 */
function business_page_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'business_page_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ee144e',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'business_page_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'business_page_custom_header_setup' );

function business_page_header_style() {
	wp_enqueue_style( 'business-page-style', get_stylesheet_uri() );
	$header_text_color = get_header_textcolor();
	$position = "absolute";
	$clip ="rect(1px, 1px, 1px, 1px)";
	if ( ! display_header_text() ) {
		$custom_css = '.site-title, .site-branding p{
			position: '.$position.';
			clip: '.$clip.'; 
		}';
	} else{

		$custom_css = '.site-title a, .site-branding {
			color: #' . esc_attr($header_text_color) . ';			
		}';
	}
	wp_add_inline_style( 'business-page-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'business_page_header_style' );