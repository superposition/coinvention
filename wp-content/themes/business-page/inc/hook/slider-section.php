<?php
/**
 * The slider hook for our theme.
 *
 * This is the template that displays slider of the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Page
 */

if ( ! function_exists( 'business_page_main_slider' ) ) :

  function business_page_main_slider(){ 		 
		$layout_slider    		= business_page_get_option( 'slider_layout' );
		$disable_slider_section = business_page_get_option( 'disable_slider_section' );		 
		$slider_category   		= business_page_get_option( 'slider_category' );			
		$slider_number	   		= business_page_get_option( 'slider_number' );		
		$banner_image			= business_page_get_option( 'banner_image' );		
		$button_title	   		= business_page_get_option( 'slider_button_title' );
		$button_url	   			= business_page_get_option( 'slider_button_url' );
		$readmore_text 			= business_page_get_option( 'readmore_text' );
		$bg_header_image = get_header_image();
		?>
		<?php if(false == $disable_slider_section){?>
			<?php if( 'slider' == $layout_slider):?>
				<section class="featured-slider" id="home">	           
			    	<?php
						$slider_args = array(
							'posts_per_page' => absint( $slider_number ),				
							'post_type' => 'post',
			                'post_status' => 'publish',
			                'paged' => 1,
							);

						if ( absint( $slider_category ) > 0 ) {
							$slider_args['cat'] = absint( $slider_category );
						}
						
						// Fetch posts.
						$the_query = new WP_Query( $slider_args );
						
					?>

					<?php if ( $the_query->have_posts() ) : ?>
						<div id="owl-slider-demo" class="owl-carousel owl-theme">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="slider-content">
									<?php if(has_post_thumbnail()):?>
										<figure class="slider-image">
											<?php the_post_thumbnail('business-page-slider');?>
										</figure>
									<?php endif;?>
									<div class="slider-text v-center">
										<h3 class="slider-title"><?php the_title();?></h3>
										<?php
											$excerpt = business_page_the_excerpt( 20 );
											echo wp_kses_post( wpautop( $excerpt ) );
										?>
										<div class="slider-btn">										
											<a href="<?php the_permalink();?>" class="read-more-button"><?php echo esc_html($readmore_text);?></a>
											<?php if (!empty($button_title)) :?>
												<a href="<?php echo esc_url($button_url	);?>" class="read-more-button"><?php echo esc_html($button_title);?></a>
											<?php endif;?>
										</div>
									</div>
								</div>
							<?php endwhile;?>
							<?php wp_reset_postdata(); ?>
		           		</div>
	           		<?php endif;?>
		        </section>
			<?php endif; ?>

			<?php if( 'banner' == $layout_slider): ?>
				<section class="featured-slider" id="home">
					<?php if( !empty( $banner_image )){ 
						$banner_img_args = array( 
						'p'             => absint( $banner_image ), 
						'post_status'     => 'publish'
					);

			        $banner_img_query = new WP_Query( $banner_img_args ); 
			        if ( $banner_img_query->have_posts() ) :
			        	while ( $banner_img_query->have_posts() ) : $banner_img_query->the_post();  ?>
							<div class="slider-content">
								<?php if(has_post_thumbnail()):?>
									<figure class="slider-image">
										<?php the_post_thumbnail();?>
									</figure>
								<?php endif;?>
				        		<div class="slider-text v-center">
									<h3 class="slider-title"><?php the_title();?></h3>
									<?php
										$excerpt = business_page_the_excerpt( 20 );
										echo wp_kses_post( wpautop( $excerpt ) );
									?>
									<div class="slider-btn">
										<a href="<?php the_permalink();?>" class="read-more-button"><?php echo esc_html($readmore_text);?></a>
										<?php if (!empty($button_title)) :?>
											<a href="<?php echo esc_url($button_url	);?>" class="read-more-button"><?php echo esc_html($button_title);?></a>
										<?php endif;?>
									</div>
								</div>
							</div>
			        	<?php endwhile;?>
			        	<?php wp_reset_postdata(); ?>	
			        <?php endif;?>	
			        <?php }	 ?>
			    </section>    	
			<?php endif;
		} else { ?>
							
				<section class="featured-slider" style="background-image: url(<?php echo esc_url($bg_header_image);?>)">				
				</section>	
			

		<?php }  ;
	}
endif;
add_action( 'business_page_slider', 'business_page_main_slider', 10 );