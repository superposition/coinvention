<?php 
/**
 * Template part for displaying Contact Section
 *
 *@package Business_Page
 */
?>
<?php 
	$contact_title    = business_page_get_option( 'contact_title' );
	$contact_section_form = business_page_get_option( 'contact_form' );

	$contact_icon_1    = business_page_get_option( 'contact_icon_1' );
	$contact_icon_2    = business_page_get_option( 'contact_icon_2' );
	$contact_icon_3    = business_page_get_option( 'contact_icon_3' );

	$contact_title_1    = business_page_get_option( 'contact_title_1' );
	$contact_title_2    = business_page_get_option( 'contact_title_2' );
	$contact_title_3    = business_page_get_option( 'contact_title_3' );

	$contact_address_1    = business_page_get_option( 'contact_address_1' );
	$contact_address_2    = business_page_get_option( 'contact_address_2' );
	$contact_address_3    = business_page_get_option( 'contact_address_3' );
?>
  <?php if(!empty($contact_title)):?>
    <header class="entry-header heading">
      <h2 class="entry-title"><?php echo esc_html($contact_title);?></h2>
    </header>
  <?php endif;?>
  <div class="custom-row contact-detail">
    <div class="custom-col-4">
      <div class=" single-contact-detail">
        <span class="contact-icon">
          <i class="<?php echo esc_attr($contact_icon_1);?>"></i>
        </span>
        <h4><?php echo esc_html($contact_title_1);?></h4>
        <a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $contact_address_1 ) ); ?>" title="<?php echo esc_attr($contact_address_1);?>"><?php echo esc_attr($contact_address_1);?></a>
      </div>
    </div>
    <div class="custom-col-4">
      <div class=" single-contact-detail">
        <span class="contact-icon">
          <i class="<?php echo esc_attr($contact_icon_2);?>"></i>
        </span>
        <h4><?php echo esc_html($contact_title_2);?></h4>        
        <a href="mailto:<?php echo esc_attr($contact_address_2);?>"><?php echo esc_attr( antispambot( $contact_address_2 ) ); ?></a>
      </div>
    </div>
    <div class="custom-col-4">
      <div class=" single-contact-detail">
        <span class="contact-icon">
          <i class="<?php echo esc_attr($contact_icon_3);?>"></i>
        </span>
        <h4><?php echo esc_html($contact_title_3);?></h4>
        <span><?php echo esc_html($contact_address_3);?></span>
      </div>
    </div>
    <div class="contact-columns-2 custom-col-12">
    	<?php echo do_shortcode( wp_kses_post( $contact_section_form ) );?>
    </div>
  </div>