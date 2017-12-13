<?php 
/**
 * Template part for displaying About Section
 *
 *@package Business_Page
 */
?>
  <?php 
    $about_title       = business_page_get_option( 'about_title' );
    $about_post[0]     = absint(business_page_get_option( 'about_first' ));
    $about_post[1]     = absint(business_page_get_option( 'about_second' ));
    $about_post[2]     = absint(business_page_get_option( 'about_third' ));
   

    $icon_post[0]     = business_page_get_option( 'icon_first' );
    $icon_post[1]     = business_page_get_option( 'icon_second' );
    $icon_post[2]     = business_page_get_option( 'icon_third' );
  ?>
    <?php if(!empty($about_title)):?>
      <header class="entry-header heading">
        <h2 class="entry-title"><?php echo esc_html($about_title);?></h2>
      </header>
    <?php endif;?>
    <div class="custom-row">
      <?php $args = array (
            'post_type' => 'page',
            'post_per_page' => 3,
            'post__in'         => $about_post,
            'orderby'           =>'post__in',
        );        
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
        $i=-1;  
          while ($loop->have_posts()) : $loop->the_post(); $i++;?>
            <div class="custom-col-4">
              <article>
                <span class="abt-icons">
                <?php if(has_post_thumbnail()){?>
                    <?php the_post_thumbnail('business-page-blog');?>
                <?php } else{ ?>
                  <i class="<?php echo esc_attr( $icon_post[$i] );?>"></i>
                <?php } ?> 
                </span>
                <header class="entry-header">
                  <h3 class="entry-title">
                    <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a>
                  </h3>
                </header>
                <?php
                  $excerpt = business_page_the_excerpt( 20 );
                  echo wp_kses_post( wpautop( $excerpt ) );
                ?>
                <?php $readmore_text = business_page_get_option( 'readmore_text' );?>
                  <a href="<?php the_permalink();?>" class="read-more-button"><?php echo esc_html($readmore_text);?></a>
                </p>
              </article>
            </div>
          <?php endwhile;?>
          <?php wp_reset_postdata(); ?>
        <?php endif;?>
    </div>