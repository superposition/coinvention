<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Business_Page
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function business_page_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$disable_slider_section = business_page_get_option( 'disable_slider_section' );
	$bg_header_image = get_header_image();
	if( true == $disable_slider_section && empty($bg_header_image) ){
		$classes[] = 'global-slider-layout';
	}


	// Add class for global layout.
	$sidebar_layout = business_page_get_option('layout_options'); 
	$sidebar_layout = apply_filters( 'business_page_filter_theme_global_layout', $sidebar_layout );
	$classes[] = 'global-layout-' . esc_attr( $sidebar_layout );
	
	return $classes;
}
add_filter( 'body_class', 'business_page_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function business_page_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'business_page_pingback_header' );

/**
 * Function to get Sections 
 */
function business_page_get_sections(){
    $sections = array( 'about', 'service','work','blog','contact' );
    $enabled_section = array();
    foreach ( $sections as $section ){
    	
        if (false == business_page_get_option('disable_'.$section.'_section')){
            $enabled_section[] = array(
                'id' => $section,
                'menu_text' => esc_html( business_page_get_option('' . $section . '_menu_title','') ),
            );
        }
    }
    return $enabled_section;
}

if ( ! function_exists( 'business_page_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function business_page_the_excerpt( $length = 0, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
		return $trimmed_content;

	}

endif;

//=============================================================
		// Active callback for Slider
//=============================================================
if ( ! function_exists( 'business_page_slider_layout' ) ) :

    function business_page_slider_layout( $control ) { 
        
        if( 'slider' == $control->manager->get_setting('theme_options[slider_layout]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;
//=============================================================
		// Active callback for Slider
//=============================================================
if ( ! function_exists( 'business_page_slider_layout_banner' ) ) :

    function business_page_slider_layout_banner( $control ) { 
        
        if( 'banner' == $control->manager->get_setting('theme_options[slider_layout]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;

//  Customizer Control
if (class_exists('WP_Customize_Control') && ! class_exists( 'Business_Page_Image_Radio_Control' ) ) {
	/**
 	* Customize sidebar layout control.
 	*/
	class Business_Page_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {

			if (empty($this->choices))
				return;

			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<ul class="controls" id='business-page-img-container'>
				<?php
				foreach ($this->choices as $value => $label) :
					$class = ($this->value() == $value) ? 'business-page-radio-img-selected business-page-radio-img-img' : 'business-page-radio-img-img';
					?>
					<li style="display: inline;">
						<label>
							<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
														  $this->link();
														  checked($this->value(), $value);
														  ?> />
							<img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
						</label>
					</li>
					<?php
				endforeach;
				?>
			</ul>
			<?php
		}

	}
}	