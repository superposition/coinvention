<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Page
 */

?>
<?php
  /**
  * Hook - business_page_action_doctype.
  *
  * @hooked business_page_doctype -  10
  */
  do_action( 'business_page_action_doctype' );
  ?>
  <head>
  <?php
  /**
  * Hook - business_page_action_head.
  *
  * @hooked business_page_head -  10
  */
  do_action( 'business_page_action_head' );
  ?>

  <?php wp_head(); ?>
  </head>

<body <?php body_class(); ?>>
  <?php
    /**
    * Hook - business_page_action_before.
    *
    * @hooked business_page_page_start - 10
    * @hooked business_page_skip_to_content - 15
    */
    do_action( 'business_page_action_before' );
    ?>
  <?php
    /**
    * Hook - business_page_action_before_header.
    *
    * @hooked business_page_header_start - 10
    */
    do_action( 'business_page_action_before_header' );
    ?>  
  <?php 
    /**
     *Hook - business_page_action_head.
     *
     *@hooked business_page_site_branding
     */
    do_action('business_page_action_header')
    ?>             
  <?php
    /**
    * Hook - business_page_action_before_content.
    *
    * @hooked business_page_content - 10
    */
    do_action( 'business_page_action_before_content' );
    ?>  