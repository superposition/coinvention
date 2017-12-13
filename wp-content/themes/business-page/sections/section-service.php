<?php 
/**
 * Template part for displaying Service Section
 *
 *@package Business_Page
 */
?>
<?php 
  $service_title       = business_page_get_option( 'service_title' );
  $service_category  = business_page_get_option( 'service_category' );
  $service_number  = business_page_get_option( 'service_number' );

?>
<?php if(!empty($service_title)):?>
  <header class="entry-header heading">
    <h2 class="entry-title"><?php echo esc_html($service_title);?></h2>
  </header>
<?php endif;?>
<div class="custom-row">
      <?php $args = array(
        'posts_per_page'      => absint( $service_number ),       
        'post_type' => 'post',
              'post_status' => 'publish',
              'paged' => 1,
        );

      if ( absint( $service_category ) > 0 ) {
        $args['cat'] = absint( $service_category );
      }    
  $loop = new WP_Query($args);                        
  if ( $loop->have_posts() ) :
  $i=-1;  
  $cn = 0;
    while ($loop->have_posts()) : $loop->the_post(); $i++; $cn++;?>
      <?php 
        $service_class= '';
        if($cn % 2 == 0):
          $service_class= 'opp';
        endif;
      ?>
      <div class="custom-col-6 <?php echo esc_attr($service_class);?>">
        <article class="post-content-wrapper">
          <span class="service-icon">
            <?php the_post_thumbnail('business-page-service');?>
          </span>          
          <div class="post-content-wrap">
            <header class="entry-header">
              <h3 class="entry-title">
                <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a>
              </h3>
            </header>
            <?php
              $excerpt = business_page_the_excerpt( 25 );
              echo wp_kses_post( wpautop( $excerpt ) );
            ?>
          </div>
        </article>
      </div>     
    <?php endwhile;?>
    <?php wp_reset_postdata(); ?>
  <?php endif;?>
</div>