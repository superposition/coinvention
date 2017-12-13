<?php
/**
 * Theme information prasoon
 *
 * @package prasoonpro
 */


if ( ! class_exists( 'Prasoon_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Prasoon_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Prasoon_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Prasoon_About_Page
		 *
		 * @var Prasoon_About_Page $instance The Prasoon_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Prasoon_About_Page instance.
		 *
		 * We make sure that only one instance of Prasoon_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Prasoon_About_Page ) ) {
				self::$instance = new Prasoon_About_Page;				
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();				
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
			$this->notification  = isset( $this->config['notification'] ) ? $this->config['notification'] : ( '<p>' . sprintf( 'Welcome! Thank you for choosing %1$s ! To take full advantage of this theme, please make sure you visit our %2$swelcome page%3$s.', $this->theme_name, '<a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-theme-info' ) ) . '">', '</a>' ) . '</p><p><a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-theme-info' ) ) . '" class="button" style="text-decoration: none;">' . sprintf( 'Get started with %s', $this->theme_name ) . '</a></p>' );		
		}

		/**
		 * Setup the actions used for this page.
		 */
		public function setup_actions() {
			
			/* activation notice */
			add_action( 'load-themes.php', array( $this, 'activation_admin_notice' ) );						
		}		
		

		/**
		 * Adds an admin notice upon successful activation.
		 */
		public function activation_admin_notice() {
			global $pagenow;
			if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
				add_action( 'admin_notices', array( $this, 'prasoon_about_page_welcome_admin_notice' ), 99 );
			}
		}

		/**
		 * Display an admin notice linking to the about page
		 */
		public function prasoon_about_page_welcome_admin_notice() {
			if ( ! empty( $this->notification ) ) {
				echo '<div class="updated notice is-dismissible">';
				echo wp_kses_post( $this->notification );
				echo '</div>';
			}
		}		

	}
}


/**
 *  Adding a About Prasoon page 
 */
add_action('admin_menu', 'prasoon_add_menu');

function prasoon_add_menu() {
     add_theme_page(__('About Prasoon Theme','prasoonpro'), __('About Prasoon','prasoonpro'),'manage_options', __('prasoonpro-theme-info','prasoonpro'), __('prasoonpro_theme_info','prasoonpro'));
}

/**
 *  Callback
 */
function prasoonpro_theme_info() {
?>
	<div class="prasoon-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2><?php _e( 'Thank you for purchasing Prasoon Premium WordPress theme', 'prasoonpro' ); ?></h2>
						<div class="title-content">
							<p><?php _e( 'Prasoon is the user friendly, modern theme with rich customization possibilities,suitable for almost any small business website. With its clean and responsive design, Prasoon is the next premium theme for your WordPress website. This theme has all the features like custom menu, header background, custom widgets etc. Prasoon is SEO friendly and the best coding standards have been used in the development.', 'prasoonpro' ); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-visibility"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/wordpress-themes/prasoon-pro/" target="_blank"><?php _e( 'VIEW<br/> DEMO', 'prasoonpro' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-format-aside"></span>
						</div>
						<div class="heading">
							<h3><a href="https://spiraclethemes.com/prasoon-documentation/" target="_blank"><?php _e( 'VIEW<br/> DOCUMENTATION', 'prasoonpro' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-video-alt2"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/prasoon-video-tutorials/" target="_blank"><?php _e( 'VIDEO<br/> TUTORIALS', 'prasoonpro' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-sos"></span>
						</div>
						<div class="heading">
							<h3><a href="https://spiraclethemes.com/support/" target="_blank"><?php _e( 'ASK FOR<br/> SUPPORT', 'prasoonpro' ); ?></a></h3>
						</div>						
					</div>
				</div>
			</div>			
		</div>		
	</div>
<?php
}
