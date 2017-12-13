<?php 
/**
 * Template part for displaying Our Work Section
 *
 *@package Business_Page
 */
?>
<?php 
	$work_title    = business_page_get_option( 'work_title' );
	$work_category = business_page_get_option( 'work_category' );
	/*return category name*/
	$cat   = get_the_category_by_ID($work_category); 
?>
<?php if ( absint( $work_category) > 0 ) { ?>
	<div class="custom-container">
	<?php if(!empty($work_title)):?>
	  <header class="entry-header heading">
	    <h2 class="entry-title"><?php echo esc_html($work_title);?></h2>
	  </header>
  	<?php endif;?>
	</div>
	<div class="portfolio-gallery-section">
	  <div class="portfolio-gallery-menu">
	    <ul>
	      <li class="filter" data-filter="all"><?php echo esc_html__('All','business-page');?></li>
	      	<?php 
		        $args = array(
		        'type'                     => 'post',	        
		        'orderby'                  => 'name',
		        'order'                    => 'ASC',
		        'hide_empty'               => FALSE,
		        'hierarchical'             => 1,
		        'taxonomy'                 => 'category',
		        ); 
		        if ( absint( $work_category ) > 0 ) {
					$args['child_of'] = absint( $work_category );
				}
		        $termchildren = get_categories($args );
		        foreach($termchildren as $termchildren):
			        $term_name = $termchildren->name;
			        $term_slug = $termchildren->slug; 
			        ?>        
	      				<li class="filter" data-filter=".<?php echo esc_attr($term_slug);?>"><?php echo esc_html($term_name);?></li>
	      		<?php  endforeach;?>      
	    </ul>
	  </div>
	  <div id="mixit-container" class="portfolio-gallery-demo">

	        <?php
	        	$category = get_category($work_category);
	        	$term = get_term_children($work_category, 'category');
	        	$child_of = (count($term)) ? 'child_of' : '';

	            $args = array(
	            'type'                     => 'post',
	            'orderby'                  => 'name',
	            'child_of'				   => $category->term_id,
	            'order'                    => 'ASC',
	            'hide_empty'               => FALSE,
	            'hierarchical'             => 1,
	            'taxonomy'                 => 'category',
	            ); 

        	if(count($term) ){
	    		$termchildren = get_categories($args );
	    	}else{
	    	$termchildren[0] = $category;
	    	}

		        foreach($termchildren as $termchildren):
		            $term_name = $termchildren->name;
		            $term_slug = $termchildren->slug; ?>

		            	<?php $the_query = new WP_Query( array ('category_name'=>$term_slug  ) );  
		            	    while ( $the_query->have_posts()):$the_query->the_post();
	                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'business-page-work' ); ?>                           
								<div class="single-work mix <?php echo esc_attr($term_slug);?>">
								  <div class="portfolio-single-gallery">
								  <?php if(has_post_thumbnail()):?>
								    <figure class="protfolio-image">
								      <a href="<?php the_permalink();?>"> <img src="<?php echo esc_url($featured_image[0]);?>" alt="img"></a>
								      <div class="work-infomation">
								        <a href="<?php the_permalink();?>"><i class="fa fa-plus"></i></a>
								      </div>
								    </figure>
							      <?php endif;?>		
								  </div>
								</div>
							<?php endwhile;?>
							 <?php wp_reset_postdata(); ?>	
				<?php endforeach;?>
	  </div>
	</div>
<?php } ?>