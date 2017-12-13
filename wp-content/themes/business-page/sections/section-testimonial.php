<?php 
/**
 * Template part for displaying Testimonial Section
 *
 *@package Business_Page
 */
?> 
<?php 
	 $testimonial_title     = business_page_get_option( 'testimonial_title' );
	 $testimonial_category  = business_page_get_option( 'testimonial_category' );
	 $testimonial_number	= business_page_get_option( 'testimonial_number' );

?> <?php if(!empty($testimonial_title)):?>
		<header class="entry-header heading">
			<h2 class="entry-title"><?php echo esc_html($testimonial_title);?></h2>
		</header>
	<?php endif;?>
	<div id="testimonial-slider" class="owl-carousel owl-theme">
    	<?php
			$testimonial_args = array(
				'posts_per_page'      => absint( $testimonial_number ),				
				'post_type' => 'post',
	            'post_status' => 'publish',
	            'paged' => 1,
				);

			if ( absint( $testimonial_category ) > 0 ) {
				$testimonial_args['cat'] = absint( $testimonial_category );
			}

			// Fetch posts.
			$the_query = new WP_Query( $testimonial_args );
			
		?>

		<?php if ( $the_query->have_posts() ) : 			
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="single-testimonial">
				  <div class="entry-content">
				  	<span class="decoration"></span>
				    <?php
						$excerpt = business_page_the_excerpt( 20 );
						echo wp_kses_post( wpautop( $excerpt ) );
					?>
				    
				  </div>
					<?php if(has_post_thumbnail()):?>
					<figure class="authore-img">
						<?php the_post_thumbnail('business-page-testimonial');?>
					</figure>
					<?php endif;?>
				  <h4 class="authore-name"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>				 
				</div>
			<?php endwhile;?>
			<?php wp_reset_postdata(); ?>
		<?php endif;?>
	</div>          

