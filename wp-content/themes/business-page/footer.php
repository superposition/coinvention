<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Page
 */

?>
<?php
  /**
   * Hook - business_page_action_before_footer.
   *
   * 
   */
  do_action( 'business_page_action_before_footer' );
?>
<?php
  /**
   * Hook - business_page_action_footer.
   *
   * 
   */
  do_action( 'business_page_action_footer' );
?>         
<?php
  /**
   * Hook - business_page_action_after_footer.
   *
   * 
   */
  do_action( 'business_page_action_after_footer' );
?>
<?php 
  /**
   * Hook - business_page_action_section_footer.
   *
   * 
   */
  do_action( 'business_page_action_section_footer' );
?>
<?php
  /**
   * Hook - business_page_action_after.
   *
   */
  do_action( 'business_page_action_after' );
?>
<?php wp_footer(); ?>

</body>  
</html>