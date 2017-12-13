<?php
/**
 * The template for displaying home page.
 * @package Business Page
 */

get_header(); ?>
<?php if ( 'posts' != get_option( 'show_on_front' ) ){?>
  <main class="primary-home" class="content-area"> <!-- main starting from here -->
    <main id="main" class="site-main">
    <?php $enabled_sections = business_page_get_sections();
      if( is_array( $enabled_sections ) ){
        foreach( $enabled_sections as $section ){

          if( ( $section['id'] == 'about' ) ){ ?>
            <?php $disable_about_section = business_page_get_option( 'disable_about_section' );
              if(false ==$disable_about_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="about-us-section">
                  <div class="custom-container">
                    <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                  </div>
                </section>
              <?php endif;?>

          <?php }elseif( $section['id'] == 'service' ) { ?>

            <?php $disable_service_section = business_page_get_option( 'disable_service_section' );
            if( false ==$disable_service_section): ?>
              <section id="<?php echo esc_attr( $section['id'] ); ?>" class="services-section">
                <div class="custom-container">
                  <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                </div>
              </section>
            <?php endif;?>
          <?php }
        }
      } ?>

      <!--  /*************************** Counter Section ******************************    -->
      <?php $disable_counter_section = business_page_get_option( 'disable_counter_section' );
        if(false ==$disable_counter_section): ?>
          <?php if(is_active_sidebar('counter')): ?>
            <section class="counter-section " data-stellar-background-ratio="0.6"> <!-- counter section starting from here -->
              <div class="custom-container">
                <?php get_template_part( 'sections/section', 'counter'); ?> 
              </div>
            </section> <!-- counter section ends here -->
          <?php endif;?> 
        <?php endif;?>

      <!---    /********************* Our Work Section  ********************/--> 
      <?php if( is_array( $enabled_sections ) ){
        foreach( $enabled_sections as $section ){

          if( ( $section['id'] == 'work' ) ){ ?>
            <?php $disable_work_section = business_page_get_option( 'disable_work_section' );
              if(false ==$disable_work_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="gallery-section">                  
                    <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>                 
                </section>
              <?php endif;?>
          <?php }
        }
      } ?>

      <!--  /*************************** Testimonial Section ******************************    -->
      <?php $disable_testimonial_section = business_page_get_option( 'disable_testimonial_section' );
        if(false ==$disable_testimonial_section): ?>
          <section class="testimonial-section"> <!-- counter section starting from here -->
            <div class="custom-container">
              <?php get_template_part( 'sections/section', 'testimonial'); ?> 
            </div>
          </section> <!-- counter section ends here --> 
        <?php endif;?>

      <!---    /********************* Blog Section  ********************/--> 
      <?php if( is_array( $enabled_sections ) ){
        foreach( $enabled_sections as $section ){ 
          if( ( $section['id'] == 'blog' ) ){ ?>
            <?php $disable_blog_section = business_page_get_option( 'disable_blog_section' );
              if(false ==$disable_blog_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-section">
                  <div class="custom-container">
                    <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                  </div>
                </section>
              <?php endif;?>
          <?php }
        }
      } ?>
      <!--  /*************************** Client Section ******************************    -->
      <?php $disable_client_section = business_page_get_option( 'disable_client_section' );            
        if(false ==$disable_client_section): ?>
          <section class="clients-section"> <!-- counter section starting from here -->
            <div class="custom-container">
              <?php get_template_part( 'sections/section', 'client'); ?> 
            </div>
          </section> <!-- counter section ends here --> 
        <?php endif;?>

      <!---    /********************* Contact Section  ********************/--> 
      <?php if( is_array( $enabled_sections ) ){
        foreach( $enabled_sections as $section ){ 
          if( ( $section['id'] == 'contact' ) ){ ?>
            <?php $disable_blog_section = business_page_get_option( 'disable_contact_section' );
              if(false ==$disable_blog_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="contact-section">
                  <div class="custom-container">
                    <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                  </div>
                </section>
              <?php endif;?>
          <?php }
        }
      } ?>

    </main>
  </main> <!-- main ends here --> 
  
<?php } else{ ?> 
    <?php 
  $layout_class ='col-8';
    $sidebar_layout = business_page_get_option('layout_options'); 
    if( is_active_sidebar('sidebar-1') && 'no-sidebar' !==  $sidebar_layout){
      $layout_class = 'custom-col-8';
    }
    else{
      $layout_class = 'custom-col-12';
    }   
  ?>
<div class="custom-container"> 
  <div id="primary" class="content-area <?php echo esc_attr($layout_class);?>">
      <main id="main" class="site-main" role="main">

        <?php
        if ( have_posts() ) :

          if ( is_home() && ! is_front_page() ) : ?>
            <header>
              <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>

          <?php
          endif;

          /* Start the Loop */
          while ( have_posts() ) : the_post();

            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_format() );

          endwhile;

          the_posts_navigation();

        else :

          get_template_part( 'template-parts/content', 'none' );

        endif; ?>

      </main><!-- #main -->
  </div><!-- #primary -->
  <?php get_sidebar();?>
</div>
<?php }?>
<?php get_footer();?>