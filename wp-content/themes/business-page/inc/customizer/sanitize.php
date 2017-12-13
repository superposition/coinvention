<?php
/**
 * Sanitization functions.
 *
 * @package Business Page
 */

if ( ! function_exists( 'business_page_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *	
	 */
	function business_page_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'business_page_dropdown_pages' ) ) :
	function business_page_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	  
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
endif;


if ( ! function_exists( 'business_page_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *	
	 */
	function business_page_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'business_page_sanitize_number_range' ) ) :

	/**
	 * Sanitize number range.
	 *	
	 */
	function business_page_sanitize_number_range( $input, $setting ) {

		// Ensure input is an absolute integer.
		$input = absint( $input );

		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		// Get min.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

		// Get max.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

		// Get Step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		// If the input is within the valid range, return it; otherwise, return the default.
		return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'business_page_sanitize_textarea_content' ) ) :

	/**
	 * Sanitize textarea content.
	 *
	 * @since 1.0.0
	 *
	 */
	function business_page_sanitize_textarea_content( $input, $setting ) {

		return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

	}
endif;


//=============================================================
// Integer Number Sanitization
//=============================================================
if ( ! function_exists( 'business_page_sanitize_number' ) ) :

    function business_page_sanitize_number( $input, $setting ) {

        $input = absint( $input );

        return ( $input ? $input : $setting->default );

    }

endif;
if ( ! function_exists( 'business_page_sanitize_textarea_content' ) ) :

	/**
	 * Sanitize textarea content.
	 *
	 * @since 1.0.0
	 *
	 */
	function business_page_sanitize_textarea_content( $input, $setting ) {

		return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

	}
endif;