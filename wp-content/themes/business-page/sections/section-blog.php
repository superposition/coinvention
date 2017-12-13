<?php 
/**
 * Template part for displaying Blog Section
 *
 *@package Business_Page
 */
?>
<?php 
	 $blog_title    = business_page_get_option( 'blog_title' );
	 $blog_category = business_page_get_option( 'blog_category' );
	 $blog_number	= business_page_get_option( 'blog_number' );
	 
	 
?> 
    <?php if(!empty($blog_title)):?>
	  <header class="entry-header heading">
	    <h2 class="entry-title"><?php echo esc_html($blog_title);?></h2>
	  </header>
  	<?php endif;?>
  <div class="custom-row">
  	<?php
		$blog_args = array(
			'posts_per_page' =>absint( $blog_number ),				
			'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => 1,
			);

		if ( absint( $blog_category ) > 0 ) {
			$blog_args['cat'] = absint( $blog_category );
		}
		
		// Fetch posts.
		$the_query = new WP_Query( $blog_args );
		
	?>

	<?php if ( $the_query->have_posts() ) : 			
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		    <div class="custom-col-4">
		      <article class="post">
		      	<?php if(has_post_thumbnail()):?>
			        <figure class="post-featured-image">
			        	<?php the_post_thumbnail('business-page-blog');?>  
			        </figure>
		    	<?php endif?>
		        <header class="entry-header">
		          <h3 class="entry-title">
		            <a href="<?php the_permalink();?>"><?php the_title();?></a>
		          </h3>
		        </header>
		        <div class="post-details">		         
		            <?php business_page_posted_on();?>
		        </div>
		        <div class="entry-content">
 				    <?php
						$excerpt = business_page_the_excerpt( 20 );
						echo wp_kses_post( wpautop( $excerpt ) );
					?>
		        </div>
		        <?php $readmore_text = business_page_get_option( 'readmore_text' );?>
		        <a href="<?php the_permalink();?>" class="read-more-button"><?php echo esc_html($readmore_text);?></a>
		      </article>
		    </div>
	    <?php endwhile;?>
	    <?php wp_reset_postdata(); ?>
    <?php endif;?>
  </div>