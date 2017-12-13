 <?php 
 /*
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Page
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="entry-content">
		
		<?php if(has_post_thumbnail()):
			the_post_thumbnail();
		endif;?>
		<header class="entry-header">
			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		</header><!-- .entry-header -->	

	</div>
	
	<div class="entry-content-wrapper">
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-page' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-content-wrapper -->	
</article><!-- #post-## -->