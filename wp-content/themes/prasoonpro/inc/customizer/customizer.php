<?php
/**
 * prasoonpro Theme Customizer
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

    require( get_template_directory() . '/inc/customizer/custom-controls/control-custom-content.php' );

    $wp_customize->remove_section( 'themes' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->remove_section( 'colors' );
    $wp_customize->remove_section( 'header_image' );

    /* General Settings */
    $wp_customize->add_section(
        'prasoonpro_general_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'General Settings', 'prasoonpro' )
        )
    );

    /* Home Section Background */
    $wp_customize->add_setting(
        'theme_home_bg',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'prasoonpro_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'theme_home_bg',
          array(
              'settings'      => 'theme_home_bg',
              'section'       => 'prasoonpro_general_settings',
              'label'         => __( 'Home Background Image', 'prasoonpro' ),
              'description'   => __( 'Upload background image for your home section', 'prasoonpro' )
          )
      )
    );

    /* Home Section Heading text */
    $wp_customize->add_setting(
        'home_heading_text',
        array(            
            'default'           => 'ENTER YOUR HEADING HERE',
            'sanitize_callback' => 'wp_kses_post',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'home_heading_text',
        array(
            'settings'      => 'home_heading_text',
            'section'       => 'prasoonpro_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading Text', 'prasoonpro' ),
            'description'   => __( 'heading for the home section', 'prasoonpro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'home_heading_text', array(
        'selector'            => '.promo-section h2',   
        'settings'            => 'home_heading_text',     
        'render_callback'     => 'prasoonpro_home_heading_text_render_callback',
        'fallback_refresh'    => false, 
    ));

    /* Home Section SubHeading text */
    $wp_customize->add_setting(
        'home_subheading_text',
        array(            
            'default'           => 'ENTER YOUR SUBHEADING HERE',
            'sanitize_callback' => 'wp_kses_post',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'home_subheading_text',
        array(
            'settings'      => 'home_subheading_text',
            'section'       => 'prasoonpro_general_settings',
            'type'          => 'textarea',
            'label'         => __( 'SubHeading Text', 'prasoonpro' ),
            'description'   => __( 'Subheading for the home section', 'prasoonpro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'home_subheading_text', array(
        'selector'            => '.promo-section p',   
        'settings'            => 'home_subheading_text',     
        'render_callback'     => 'prasoonpro_home_subheading_text_render_callback',
        'fallback_refresh'    => false, 
    ));

    /* Home Section Button text */
    $wp_customize->add_setting(
        'home_button_text',
        array( 
            'type' => 'theme_mod',           
            'default'           => '',
            'sanitize_callback' => 'prasoonpro_sanitize_html',
            
        )
    );

    $wp_customize->add_control(
        'home_button_text',
        array(
            'settings'      => 'home_button_text',
            'section'       => 'prasoonpro_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button Text', 'prasoonpro' ),
            'description'   => __( 'Button text for the home section', 'prasoonpro' ),
        )
    );  


    /* Home Section Button url */
    $wp_customize->add_setting(
        'home_button_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'prasoonpro_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'home_button_url',
        array(
            'settings'      => 'home_button_url',
            'section'       => 'prasoonpro_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button URL', 'prasoonpro' ),
            'description'   => __( 'Button URL for the home section, you can paste youtube or vimeo video url also', 'prasoonpro' ),
        )
    );


    /* Home Section Button2 text */
    $wp_customize->add_setting(
        'home_button2_text',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'prasoonpro_sanitize_html'
        )
    );

    $wp_customize->add_control(
        'home_button2_text',
        array(
            'settings'      => 'home_button2_text',
            'section'       => 'prasoonpro_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button 2 Text', 'prasoonpro' ),
            'description'   => __( 'Button 2 text for the home section', 'prasoonpro' ),
        )
    );


    /* Home Section Button2 url */
    $wp_customize->add_setting(
        'home_button2_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'prasoonpro_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'home_button2_url',
        array(
            'settings'      => 'home_button2_url',
            'section'       => 'prasoonpro_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button 2 URL', 'prasoonpro' ),
            'description'   => __( 'Button 2 URL for the home section, you can paste youtube or vimeo video url also', 'prasoonpro' ),
        )
    );


    /* Parallax Scroll for background image */ 
    $wp_customize->add_setting(
        'home_parallax',
        array(
            'type' => 'theme_mod',
            'default'           => 'yes',
            'sanitize_callback' => 'prasoonpro_sanitize_radio_selection'
        )
    );

    $wp_customize->add_control(
        'home_parallax',
        array(
            'settings'      => 'home_parallax',
            'section'       => 'prasoonpro_general_settings',
            'type'          => 'radio',
            'label'         => __( 'Enable Parallax scroll:', 'prasoonpro' ),
            'description'   => __( 'Choose whether to show a parallax scroll feature for the Home Background image', 'prasoonpro' ),
            'choices' => array(
                            'yes' => __('Yes', 'prasoonpro'),
                            'no' => __('No', 'prasoonpro'),
                            ),
        )
    ); 


    /* Slider Settings */
    $wp_customize->add_section(
        'prasoonpro_slider_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Slider Settings', 'prasoonpro' )
        )
    );    


    /* Slider settings */
    $wp_customize->add_setting(
        'slide_option1_radio',
        array(
            'type' => 'theme_mod',
            'default'           => 'single',
            'sanitize_callback' => 'prasoonpro_sanitize_slider_option1_selection'
        )
    );

    $wp_customize->add_control(
        'slide_option1_radio',
        array(
            'settings'      => 'slide_option1_radio',
            'section'       => 'prasoonpro_slider_settings',
            'type'          => 'radio',
            'label'         => __( 'Choose Slider or Simple Background Image:', 'prasoonpro' ),
            'description'   => __( 'Choose whether to show a slider with multiple background images to slide or just a single background image', 'prasoonpro' ),
            'choices' => array(
                            'single' => __('Single Background Image', 'prasoonpro'),
                            'slider' => __('Slider Images', 'prasoonpro'),                           
                            ),
        )
    );


    /* Sticky Header Settings */
    $wp_customize->add_section(
        'prasoonpro_sticky_header_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Sticky Header & Logo Settings', 'prasoonpro' )
        )
    );

    $wp_customize->add_setting(
        'pr_sticky_menu',
        array(
            'type' => 'theme_mod',
            'default'           => 'yes',
            'sanitize_callback' => 'prasoonpro_sanitize_radio_selection'
        )
    );

    $wp_customize->add_control(
        'pr_sticky_menu',
        array(
            'settings'      => 'pr_sticky_menu',
            'section'       => 'prasoonpro_sticky_header_settings',
            'type'          => 'radio',
            'label'         => __( 'Enable Sticky Header Feature:', 'prasoonpro' ),
            'description'   => __( 'Choose whether to enable a sticky header feature for the site', 'prasoonpro' ),
            'choices' => array(
                            'yes' => __('Yes', 'prasoonpro'),
                            'no' => __('No', 'prasoonpro'),
                            ),
        )
    );

    /* sticky header logo */
    $wp_customize->add_setting(
        'sticky_header_logo',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'prasoonpro_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'sticky_header_logo',
          array(
              'settings'      => 'sticky_header_logo',
              'section'       => 'prasoonpro_sticky_header_settings',
              'label'         => __( 'Logo for Sticky Header', 'prasoonpro' ),
              'description'   => __( 'Upload logo for sticky header. Recommended height is 40px', 'prasoonpro' )
          )
      )
    );


    /* Theme logo content page */
    $wp_customize->add_setting(
        'theme_content_logo',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'prasoonpro_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'theme_content_logo',
          array(
              'settings'      => 'theme_content_logo',
              'section'       => 'prasoonpro_sticky_header_settings',
              'label'         => __( 'Logo for White Background Pages', 'prasoonpro' ),
              'description'   => __( 'Upload logo for white background pages. Maximum height is 60px, Recommended logo width is 180px', 'prasoonpro' )
          )
      )
    );


    /* Scroll Down Settings */
    $wp_customize->add_section(
        'prasoonpro_scrolldown_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Scroll Down Settings', 'prasoonpro' )
        )
    );  

    $wp_customize->add_setting(
        'home_scroll_down',
        array(
            'type' => 'theme_mod',
            'default'           => 'yes',
            'sanitize_callback' => 'prasoonpro_sanitize_radio_selection'
        )
    );

    $wp_customize->add_control(
        'home_scroll_down',
        array(
            'settings'      => 'home_scroll_down',
            'section'       => 'prasoonpro_scrolldown_settings',
            'type'          => 'radio',
            'label'         => __( 'Enable Home scroll Feature:', 'prasoonpro' ),
            'description'   => __( 'Choose whether to enable a scroll down feature for the Home section', 'prasoonpro' ),
            'choices' => array(
                            'yes' => __('Yes', 'prasoonpro'),
                            'no' => __('No', 'prasoonpro'),
                            ),
        )
    );


    /* Scroll Button url */
    $wp_customize->add_setting(
        'scroll_button_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'prasoonpro_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'scroll_button_url',
        array(
            'settings'      => 'scroll_button_url',
            'section'       => 'prasoonpro_scrolldown_settings',
            'type'          => 'textbox',
            'label'         => __( 'Scroll Button URL', 'prasoonpro' ),
            'description'   => __( 'Scroll Button URL for the home section', 'prasoonpro' ),
        )
    );
    
    /* Color Settings */
    $wp_customize->add_section(
        'prasoonpro_color_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Color Settings', 'prasoonpro' )
        )
    );

    /* Anchor Link color */
    $wp_customize->add_setting(
        'link_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#e06d6d',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'settings'      => 'link_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Anchor Link Color', 'prasoonpro' ),
                'description'   => '',
            )
        )
    );

    /* Anchor link hover color */
    $wp_customize->add_setting(
        'link_hover_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#bd0303',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_hover_color',
            array(
                'settings'      => 'link_hover_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Anchor Link Color On Hover', 'prasoonpro' ),
                'description'   => '',
            )
        )
    );  

    /* Button Hover Background color */
    $wp_customize->add_setting(
        'trans_buttonhover_bg_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#dd3333',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'trans_buttonhover_bg_color',
            array(
                'settings'      => 'trans_buttonhover_bg_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Transparent Button Hover Background Color', 'prasoonpro' ),
                'description'   => __( 'Choose background color when hovering over the transparent button', 'prasoonpro' )
            )
        )
    );

    /* Button hover text color */
    $wp_customize->add_setting(
        'trans_buttonhover_text_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'trans_buttonhover_text_color',
            array(
                'settings'      => 'trans_buttonhover_text_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Transparent Button Hover Text Color', 'prasoonpro' ),
                'description'   => __( 'Choose text color when hovering over the transparent button', 'prasoonpro' )
            )
        )
    );

    /* Dropdown menu hover color */
    $wp_customize->add_setting(
        'dd_menu_bg_hover_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#dd3333',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'dd_menu_bg_hover_color',
            array(
                'settings'      => 'dd_menu_bg_hover_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Dropdown menu hover background color', 'prasoonpro' ),
                'description'   => ''
            )
        )
    );

    /* Blog category text color */
    $wp_customize->add_setting(
        'blog_cat_text_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#555555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blog_cat_text_color',
            array(
                'settings'      => 'blog_cat_text_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Blog Category Text Color', 'prasoonpro' ),               
            )
        )
    );

    /* Blog post title text color */
    $wp_customize->add_setting(
        'blog_post_title_text_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#555555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blog_post_title_text_color',
            array(
                'settings'      => 'blog_post_title_text_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Blog Post Title Color', 'prasoonpro' ),               
            )
        )
    );  


    /* Contact form button */
    $wp_customize->add_setting(
        'cf7_btn_bg_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#dd3333',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'cf7_btn_bg_color',
            array(
                'settings'      => 'cf7_btn_bg_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Contact form Button Background Color', 'prasoonpro' ),               
            )
        )
    );

    /* Contact form button text color */
    $wp_customize->add_setting(
        'cf7_btn_txt_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'cf7_btn_txt_color',
            array(
                'settings'      => 'cf7_btn_txt_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Contact form Button Text Color', 'prasoonpro' ),               
            )
        )
    );  

    /* Social icons color */
    $wp_customize->add_setting(
        'si_bg_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#555555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'si_bg_color',
            array(
                'settings'      => 'si_bg_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Social Icon Color', 'prasoonpro' ),               
            )
        )
    );  

    /* Social icon hover background color */
    $wp_customize->add_setting(
        'si_hover_bg_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'si_hover_bg_color',
            array(
                'settings'      => 'si_hover_bg_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Social Icon Hover Background Color', 'prasoonpro' ),               
            )
        )
    );

    /* Social icon hover color */
    $wp_customize->add_setting(
        'si_hover_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'si_hover_color',
            array(
                'settings'      => 'si_hover_color',
                'section'       => 'prasoonpro_color_settings',            
                'label'         => __( 'Social Icon Hover Color', 'prasoonpro' ),               
            )
        )
    );  


    /* Google Fonts Settings */
    $wp_customize->add_section(
        'prasoonpro_fonts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Fonts Settings', 'prasoonpro' )
        )
    );   

    /* body font name */
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'type' => 'theme_mod',
            'default'           => 'Lato:400,300,700,900',
            'sanitize_callback' => 'prasoonpro_sanitize_text',            
        )
    );

    $wp_customize->add_control(
        'body_font_name',
        array(
            'settings'      => 'body_font_name',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Body Font Name', 'prasoonpro' ),
            'description'   => __( 'Enter font name with complete font styles. More info on how to add fonts, please see the documentation of this theme', 'prasoonpro' ),
        )
    );

    /* body font family */
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'type' => 'theme_mod',
            'default'           => 'Lato, sans-serif',
            'sanitize_callback' => 'prasoonpro_sanitize_text',            
        )
    );

    $wp_customize->add_control(
        'body_font_family',
        array(
            'settings'      => 'body_font_family',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Body Font Family', 'prasoonpro' ),
            'description'   => __( 'Enter font family for Body. More info on how to add font family, please see the documentation of this theme', 'prasoonpro' ),
        )
    ); 

    /* headings font name */
    $wp_customize->add_setting(
        'heading_font_name',
        array(
            'type' => 'theme_mod',
            'default'           => 'Lato:400,300,700,900',
            'sanitize_callback' => 'prasoonpro_sanitize_text',            
        )
    );

    $wp_customize->add_control(
        'heading_font_name',
        array(
            'settings'      => 'heading_font_name',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Headings Font Name', 'prasoonpro' ),
            'description'   => __( 'Enter font name for Headings with complete font styles. More info on how to add fonts, please see the documentation of this theme', 'prasoonpro' ),
        )
    );

    /* headings font family */
    $wp_customize->add_setting(
        'heading_font_family',
        array(
            'type' => 'theme_mod',
            'default'           => 'Lato, sans-serif',
            'sanitize_callback' => 'prasoonpro_sanitize_text',            
        )
    );

    $wp_customize->add_control(
        'heading_font_family',
        array(
            'settings'      => 'heading_font_family',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Headings Font Family', 'prasoonpro' ),
            'description'   => __( 'Enter font family for Headings. More info on how to add font family, please see the documentation of this theme', 'prasoonpro' ),
        )
    ); 

    /* body font size */
    $wp_customize->add_setting(
        'body_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '14',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'body_font_size',
        array(
            'settings'      => 'body_font_size',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Body Font Size (px)', 'prasoonpro' ),
            'description'   => '',
        )
    );

    /* H1 font size */
   $wp_customize->add_setting(
        'h1_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '34',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'h1_font_size',
        array(
            'settings'      => 'h1_font_size',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H1 Font Size (px)', 'prasoonpro' ),
            'description'   => '',
        )
    );

    /* H2 font size */
   $wp_customize->add_setting(
        'h2_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '30',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'h2_font_size',
        array(
            'settings'      => 'h2_font_size',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H2 Font Size (px)', 'prasoonpro' ),
            'description'   => '',
        )
    ); 

    /* H3 font size */
   $wp_customize->add_setting(
        'h3_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '25',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'h3_font_size',
        array(
            'settings'      => 'h3_font_size',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H3 Font Size (px)', 'prasoonpro' ),
            'description'   => '',
        )
    );

    /* H4 font size */
   $wp_customize->add_setting(
        'h4_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '18',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'h4_font_size',
        array(
            'settings'      => 'h4_font_size',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H4 Font Size (px)', 'prasoonpro' ),
            'description'   => '',
        )
    ); 

    /* H5 font size */
   $wp_customize->add_setting(
        'h5_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '16',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'h5_font_size',
        array(
            'settings'      => 'h5_font_size',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H5 Font Size (px)', 'prasoonpro' ),
            'description'   => '',
        )
    );

     /* H6 font size */
   $wp_customize->add_setting(
        'h6_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '14',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'h6_font_size',
        array(
            'settings'      => 'h6_font_size',
            'section'       => 'prasoonpro_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H6 Font Size (px)', 'prasoonpro' ),
            'description'   => '',
        )
    );


    /* Blog Styles Settings */
    $wp_customize->add_section(
        'prasoonpro_blog_styles_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Blog Styles', 'prasoonpro' )
        )
    );

    $wp_customize->add_setting(
        'blog_styles',
        array(
            'type' => 'theme_mod',
            'default'           => 'default',
            'sanitize_callback' => 'prasoonpro_sanitize_blog_styles_selection'
        )
    );


    $wp_customize->add_control(
        'blog_styles',
        array(
            'settings'      => 'blog_styles',
            'section'       => 'prasoonpro_blog_styles_settings',
            'type'          => 'radio',
            'label'         => __( 'Select Blog Style:', 'prasoonpro' ),
            'description'   => '',
            'choices' => array(
                            'default' => __('Blog Default', 'prasoonpro'),
                            'style1' => __('Blog Style 1', 'prasoonpro'),
                            'style2' => __('Blog Style 2', 'prasoonpro'),
                            ),
        )
    );


    /* Footer Settings */
    $wp_customize->add_section(
        'prasoonpro_footer_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Footer Settings', 'prasoonpro' )
        )
    );

    /* Copyright text */
    $wp_customize->add_setting(
        'copyright_text',
        array(
            'type' => 'theme_mod',
            'default'           => sprintf( __( 'Copyright %s. All rights reserved.', 'prasoonpro' ), wp_filter_post_kses( get_bloginfo( 'name' ) ) ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );

    $wp_customize->add_control(
        'copyright_text',
        array(
            'settings'      => 'copyright_text',
            'section'       => 'prasoonpro_footer_settings',
            'type'          => 'textarea',
            'label'         => __( 'Footer copyright text', 'prasoonpro' ),
            'description'   => __( 'Copyright text to be displayed in the footer. HTML allowed.', 'prasoonpro' )
        )
    );

    /* Footer Background Color */     
    $wp_customize->add_setting(
        'footer_bg_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
                'settings'      => 'footer_bg_color',
                'section'       => 'prasoonpro_footer_settings',            
                'label'         => __( 'Footer Background Color', 'prasoonpro' ),               
            )
        )
    );


    /* Footer Text Color */     
    $wp_customize->add_setting(
        'footer_txt_color',
        array(
            'type' => 'theme_mod',
            'default'     => '#555555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_txt_color',
            array(
                'settings'      => 'footer_txt_color',
                'section'       => 'prasoonpro_footer_settings',            
                'label'         => __( 'Footer Text Color', 'prasoonpro' ),               
            )
        )
    );

    /* Preloader Settings */
    $wp_customize->add_section(
        'prasoonpro_preloader_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Preloader Settings', 'prasoonpro' )
        )
    );


    /* Preloader Enable radio button */
    $wp_customize->add_setting(
        'preloader_display',
        array(
            'type' => 'theme_mod',
            'default'           => 'yes',
            'sanitize_callback' => 'prasoonpro_sanitize_radio_selection'
        )
    );

    $wp_customize->add_control(
        'preloader_display',
        array(
            'settings'      => 'preloader_display',
            'section'       => 'prasoonpro_preloader_settings',
            'type'          => 'radio',
            'label'         => __( 'Enable Preloader for site:', 'prasoonpro' ),
            'description'   => __( 'Choose whether to show a preloader before a site opens', 'prasoonpro' ),
            'choices' => array(
                            'yes' => __('Yes', 'prasoonpro'),
                            'no' => __('No', 'prasoonpro'),
                            ),
        )
    ); 

    /* Image for preloader */
    $wp_customize->add_setting(
        'preloader_image',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'prasoonpro_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'preloader_image',
          array(
              'settings'      => 'preloader_image',
              'section'       => 'prasoonpro_preloader_settings',
              'label'         => __( 'Preloader Image', 'prasoonpro' ),
              'description'   => __( 'Upload image for preloader', 'prasoonpro' )
          )
      )
    );

    
    /* Documentation */
    $wp_customize->add_section(
        'prasoonpro_doc_settings',
        array(
            'priority'      => 200,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Prasoon Documentation', 'prasoonpro' ),
            'description' => '<p class="customize-control-title">' .__('Check Complete documention of this theme','prasoonpro'). '</p><h3>' .'<a target="_blank" href="https://www.spiraclethemes.com/prasoon-documentation/">'. __('View Documentation','prasoonpro'). '</a></h3>',         
        )
    );    
    
    /* documentation information */
    $wp_customize->add_setting(
        'doc_text',
        array(
            'type' => 'info', 
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',                                   
        )
    );

    $wp_customize->add_control(
        new Prasoonpro_Documentation(
            $wp_customize,
            'doc_text',
            array(
                'settings'      => 'doc_text',
                'section'       => 'prasoonpro_doc_settings',                            
            )
        )
    );   
}
endif;
add_action( 'customize_register', 'prasoonpro_customize_register' );



/**
* Render callback for home_heading_text
*
* 
* @return mixed
*/
if ( ! function_exists( 'prasoonpro_home_heading_text_render_callback' ) ) :
function prasoonpro_home_heading_text_render_callback() {
    return wp_kses_post( get_theme_mod( 'home_heading_text' ) );
}
endif;
/**
* Render callback for home_subheading_text
*
* 
* @return mixed
*/
if ( ! function_exists( 'prasoonpro_home_subheading_text_render_callback' ) ) :
function prasoonpro_home_subheading_text_render_callback() {
    return wp_kses_post( get_theme_mod( 'home_subheading_text' ) );
}
endif;
/**
* Render callback for home_subheading_text
*
* 
* @return mixed
*/
if ( ! function_exists( 'prasoonpro_home_button_text_render_callback' ) ) :
function prasoonpro_home_button_text_render_callback() {
    return wp_kses_post( get_theme_mod( 'home_button_text' ) );
}
endif;

/**
 * Sanitize text box.
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'prasoonpro_sanitize_text' ) ) :
function prasoonpro_sanitize_text( $input ) {
    return esc_html( $input );
}
endif;

/**
 * Sanitize Slider radio option1 buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'prasoonpro_sanitize_slider_option1_selection' ) ) :
function prasoonpro_sanitize_slider_option1_selection( $input ) {
    $valid = array(
        'single' => 'Single Background Image',
         'slider' => 'Slider Images',
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize Blog styles radio buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'prasoonpro_sanitize_blog_styles_selection' ) ) :
function prasoonpro_sanitize_blog_styles_selection( $input ) {
    $valid = array(
        'default' => __('Blog Default', 'prasoonpro'),
        'style1' => __('Blog Style 1', 'prasoonpro'),
        'style2' => __('Blog Style 2', 'prasoonpro'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize radio option buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'prasoonpro_sanitize_radio_selection' ) ) :
function prasoonpro_sanitize_radio_selection( $input ) {
    $valid = array(
        'yes' => 'Yes',
        'no' => 'No',
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize checkbox.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
if ( ! function_exists( 'prasoonpro_sanitize_checkbox' ) ) :
function prasoonpro_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
endif;

/**
 * URL sanitization.
 *
 * @see esc_url_raw() https://developer.wordpress.org/reference/functions/esc_url_raw/
 *
 * @param string $url URL to sanitize.
 * @return string Sanitized URL.
 */
if ( ! function_exists( 'prasoonpro_sanitize_url' ) ) :
function prasoonpro_sanitize_url( $url ) {
    return esc_url_raw( $url );
}
endif;

/**
 * Select sanitization
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
if ( ! function_exists( 'prasoonpro_sanitize_select' ) ) :
function prasoonpro_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;

/**
 * Sanitize checkbox option buttons
 *
 * @param string $input
 * @return bool
 */
if ( ! function_exists( 'prasoonpro_sanitize_checkbox_selection' ) ) :
function prasoonpro_sanitize_checkbox_selection( $input ) {
    return ( ( isset( $input ) && true == $input ) ? true : false );
}
endif;


/**
 * Sanitize textarea.
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'prasoonpro_sanitize_textarea' ) ) :
function prasoonpro_sanitize_textarea( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
endif;

/**
 * Sanitize image.
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
if ( ! function_exists( 'prasoonpro_sanitize_image' ) ) :
function prasoonpro_sanitize_image( $image, $setting ) {
    /*
     * Array of valid image file types.
     *
     * The array includes image mime types that are included in wp_get_mime_types()
     */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    // Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
endif;

/**
 * Sanitize the Sidebar Position value.
 *
 * @param string $position.
 * @return string (left|right).
 */
if ( ! function_exists( 'prasoonpro_sanitize_sidebar_position' ) ) :
function prasoonpro_sanitize_sidebar_position( $position ) {
    if ( ! in_array( $position, array( 'left', 'right' ) ) ) {
        $position = 'right';
    }
    return $position;
}
endif;


/**
 * HTML sanitization
 *
 * @see wp_filter_post_kses() https://developer.wordpress.org/reference/functions/wp_filter_post_kses/
 *
 * @param string $html HTML to sanitize.
 * @return string Sanitized HTML.
 */
if ( ! function_exists( 'prasoonpro_sanitize_html' ) ) :
function prasoonpro_sanitize_html( $html ) {
    return wp_filter_post_kses( $html );
}
endif;

/**
 * CSS sanitization.
 *
 * @see wp_strip_all_tags() https://developer.wordpress.org/reference/functions/wp_strip_all_tags/
 *
 * @param string $css CSS to sanitize.
 * @return string Sanitized CSS.
 */
if ( ! function_exists( 'prasoonpro_sanitize_css' ) ) :
function prasoonpro_sanitize_css( $css ) {
    return wp_strip_all_tags( $css );
}
endif;

/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'prasoonpro_enqueue_customizer_stylesheets' ) ) :
function prasoonpro_enqueue_customizer_stylesheets() {
    wp_register_style( 'customizer-css', get_template_directory_uri() . '/inc/customizer/assets/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'customizer-css' );
}
endif;

add_action( 'customize_controls_print_styles', 'prasoonpro_enqueue_customizer_stylesheets' );
