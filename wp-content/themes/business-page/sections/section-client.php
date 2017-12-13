<?php 
/**
 * Template part for displaying Client Section
 *
 *@package Business_Page
 */
?>
<?php 
	 $client_category  = business_page_get_option( 'client_category' );
?>
<div id="clients-slider" class="owl-carousel owl-theme">
	<?php
		$client_args = array(						
			'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => 1,
			);

		if ( absint( $client_category ) > 0 ) {
			$client_args['cat'] = absint( $client_category );
		}

		// Fetch posts.
		$the_query = new WP_Query( $client_args );
		
	?>

	<?php if ( $the_query->have_posts() ) : 			
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php if(has_post_thumbnail( ) ):?>
		    <figure class="individual-client">
		    	<?php the_post_thumbnail();?>
		    </figure>
	    <?php endif;?>
	    <?php endwhile;?>
	    <?php wp_reset_postdata(); ?>
    <?php endif;?>
    
</div>