<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Business Page
 */

if( ! function_exists( 'business_page_site_branding' ) ) :
	/**
  	 * Site Branding
  	 *
  	 * @since 1.0.0
  	 */
function business_page_site_branding() { ?>
	<div class="hgroup-wrap"> <!-- hgroup-wrap starting from here -->
          <div class="custom-container main-menu">
            <section class="site-branding"> <!-- site-branding starting from here -->
              <h1 class="site-logo">
                <figure>
                  <?php if(has_custom_logo()):?>
                    <?php the_custom_logo();?>
                  <?php endif;?>
                </figure>
              </h1>
              <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">  <?php bloginfo( 'name' ); ?></a>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                  <span class="site-description"><?php echo esc_html($description);?></span>
                <?php
              endif; ?>
              </h1>
            </section> <!-- site-branding ends here -->
            <section class="hgroup-right">
              <div id="navbar" class="navbar"> <!-- navbar starting from here -->
                <nav id="site-navigation" class="navigation main-navigation">
                  <div class="menu-top-menu-container clearfix">
                    <?php $enabled_sections = business_page_get_sections();
                          $enable_home_link     = business_page_get_option( 'enable_home_link' );
                          $enable_single_menu   = business_page_get_option( 'enable_single_menu' );
                          $menu_single_title    = business_page_get_option( 'menu_single_title' );
                    ?>
                    <?php if(true == $enable_single_menu){ ?>
                      <ul>
                        <?php if(true == $enable_home_link):?>
                          <li><a href="<?php echo esc_url(home_url('/'));?>#home" target="_self"><?php echo esc_html( $menu_single_title ); ?></a>
                          </li>
                        <?php endif;?>
                          <?php foreach( $enabled_sections as $section ){ 
                            if( $section['menu_text'] ){
                          ?>
                          <li><a href="<?php echo esc_url( home_url( '/' ).'#' . esc_attr( $section['id'] ) ); ?>"><?php echo esc_html( $section['menu_text'] );?></a></li>                        
                          <?php 
                                  } 
                              }
                          ?>
                      </ul>
                    <?php } else{ 
                      wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu','fallback_cb'    => 'business_page_primary_navigation_fallback' ) ); 
                    } ?>
                  </div>
                </nav>
              </div> <!-- navbar ends here -->
            </section>
          </div>
    </div> <!-- hgroup-wrap ends here --> 
<?php }
endif;
add_action( 'business_page_action_header', 'business_page_site_branding');

if( ! function_exists( 'business_page_social_links' ) ) : 
  /**
   *
   * Social Links
   *
   */
  function business_page_social_links() {

    $facebook     = business_page_get_option( 'facebook' );
    $twitter      = business_page_get_option( 'twitter' );
    $google_plus  = business_page_get_option( 'google_plus' );
    $pinterest    = business_page_get_option( 'pinterest' );
    $linkedin     = business_page_get_option( 'linkedin' );    
    ?>
    <ul>      
      <?php if($facebook){?>
        <li>
          <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" title="facebook"></a><span></span>
        </li>
      <?php } ?>

      <?php if($twitter){?>
        <li>
          <a href="<?php echo esc_url( $twitter); ?>" target="_blank" title="twitter"></a><span></span>
        </li>
      <?php } ?>

      <?php if($google_plus){?>
        <li>
          <a href="<?php echo esc_url( $google_plus); ?>" target="_blank" title="plus google"></a><span></span>
        </li>
      <?php } ?>

      <?php if($pinterest){?>
        <li>
          <a href="<?php echo esc_url( $pinterest); ?>" target="_blank" title="pinterest"></a><span></span>
        </li>
      <?php } ?>

      <?php if($linkedin){?>
        <li>
          <a href="<?php echo esc_url( $linkedin); ?>" target="_blank" title="linkedin"></a><span></span>
        </li>
      <?php } ?>
    </ul>
  <?php }
endif;
add_action( 'business_page_action_social_links', 'business_page_social_links');

if ( ! function_exists( 'business_page_footer_top_section' ) ) :

  /**
   * Top  Footer 
   *
   * @since 1.0.0
   */
  function business_page_footer_top_section() { 
    $top_footer = business_page_get_option('enable_top_footer'); 
    $enable_social_footer = business_page_get_option('enable_social_footer');

    if('true' == $enable_social_footer):?>
      <section class="top-footer"> <!-- top footer starting from here -->
        <div class="custom-container">
          <div class="inline-social-icons social-links"> <!-- social links starting from here -->
            <?php do_action( 'business_page_action_social_links' );?>
          </div> <!-- social links ends here -->
        </div>
      </section> <!-- top footer ends here -->

    <?php endif;

    if('true' == $top_footer):?>
      <?php if ( is_active_sidebar( 'footer-1' ) ||
         is_active_sidebar( 'footer-2' ) ||
         is_active_sidebar( 'footer-3' ) ||
         is_active_sidebar( 'footer-4' ) ) :
      ?>
      <div class="widget-area"> <!-- widget area starting from here -->
          <div class="custom-container">
                  <?php
                    $column_count = 0;
                    $class_coloumn =12;
                    for ( $i = 1; $i <= 4; $i++ ) {
                      if ( is_active_sidebar( 'footer-' . $i ) ) {
                        $column_count++;
                        $class_coloumn = 12/$column_count;
                      }
                    }
                 ?>
            
            <?php
              $column_class = 'custom-col-' . absint( $class_coloumn );
              for ( $i = 1; $i <= 4 ; $i++ ) {
                if ( is_active_sidebar( 'footer-' . $i ) ) {
                ?>
                  <div class="<?php echo esc_attr( $column_class ); ?>">
                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                  </div>
                  <?php
                }
              }
            ?>
            </div>
          
      </div> <!-- widget area starting from here -->
    <?php endif;?>  
    <?php endif;
 }
endif;

add_action( 'business_page_action_footer', 'business_page_footer_top_section', 10 );

if ( ! function_exists( 'business_page_footer_section' ) ) :

  /**
   * Footer copyright
   *
   * @since 1.0.0
   */
  function business_page_footer_section() { ?>
    <div class="site-generator"> <!-- site generator starting from here -->
      <?php 
        $copyright_footer = business_page_get_option('copyright_text'); 
        if ( ! empty( $copyright_footer ) ) {
        $copyright_footer = wp_kses_data( $copyright_footer );
        }
        // Powered by content.
        $powered_by_text = sprintf( __( 'Theme by %s', 'business-page' ), '<a target="_blank" rel="designer" href="https://aarambhathemes.com/">ARAMBHA THEME</a>' );
      ?>
      <div class="custom-container">
        <span class="copy-right"><?php echo esc_html($copyright_footer);?><?php echo $powered_by_text;?></span>
      </div> 
    </div> <!-- site generator ends here -->
    
  <?php }

endif;
add_action( 'business_page_action_footer', 'business_page_footer_section', 10 );