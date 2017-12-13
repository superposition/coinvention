<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Page
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if( is_sticky() ){ ?>
	    	<div class="favourite"><i class="fa fa-star"></i></div>
		<?php } ?>

		<?php if ( has_post_thumbnail() ) { ?>
			<figure>
			    <?php the_post_thumbnail(); ?>
			</figure>
		<?php } ?>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php business_page_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
			<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php business_page_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php $readmore_text = business_page_get_option( 'readmore_text' );?>
	<div class="entry-content">
		<a class="read-more-button" href="<?php the_permalink();?>"><?php echo esc_html($readmore_text);?></a>
	</div>
</article><!-- #post-## -->
