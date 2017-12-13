<?php
/**
 * Business Page functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Business_Page
 */

if ( ! function_exists( 'business_page_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function business_page_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Business Page, use a find and replace
	 * to change 'business-page' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'business-page', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'business-page-slider', 1349, 2023, true);
	add_image_size( 'business-page-service', 70, 70, true);
	add_image_size( 'business-page-testimonial', 180, 180, true);
	add_image_size( 'business-page-blog', 360, 270, true);
	add_image_size( 'business-page-work', 317, 241, true);
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'business-page' ),
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo' , array(
		'height'		=>45,	
		'width'			=>45,	
		'flex-height'	=>true,	
		'flex-width'	=>true,
	));

	add_theme_support( 'custom-header',array(		
		'width'         => 1351,		
		'height'        => 400,
		
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'custom-header', array(	
		'width'                  => 1351,
		'height'                 => 400,
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'business_page_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'business_page_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_page_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_page_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_page_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_page_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'business-page' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'business-page' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'business-page' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'business-page' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'business-page' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'business-page' ), 4 ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Counter', 'business-page' ),
		'id'            => 'counter',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'business_page_widgets_init' );

/**
 * Register custom fonts.
 */
function business_page_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$poppins = _x( 'on', 'Roboto font: on or off', 'business-page' );

	if ( 'off' !== $poppins ) {
		$font_families = array();

		$font_families[] = 'Roboto:300,400,500,600,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
			);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function business_page_scripts() {
	$fonts_url = business_page_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'business-page-google-fonts', $fonts_url, array(), null );}	

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', '4.7.0' );

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css', '', 'v2.2.0');

	wp_enqueue_style( 'owl-theme', get_template_directory_uri() .'/css/owl.theme.css', '', 'v2.2.0');

	wp_enqueue_style( 'meanmenu-css', get_template_directory_uri() .'/css/meanmenu.css', '', '2.0.7');
	wp_enqueue_style( 'business-page-style', get_stylesheet_uri() );	
		add_editor_style( 'business-page-style', get_stylesheet_uri());

	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'stellar-js', get_template_directory_uri() . '/js/stellar.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'jquery-mixitup-js', get_template_directory_uri() . '/js/jquery.mixitup.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'jquery-meanmenu-js', get_template_directory_uri() . '/js/jquery.meanmenu.js', array(), '2.0.8', true );

	wp_enqueue_script( 'business-page-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'business-page-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'business-page-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151215', true );  

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_page_scripts' );

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';
