<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package prasoonpro
 */

?>

<div class="page-title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="bread-crumb">
					<?php if (function_exists('prasoonpro_custom_breadcrumbs')) prasoonpro_custom_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>	
</div>
<div class="content-inner">
	<div class="content-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php
								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'prasoonpro' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<?php
								edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										__( 'Edit %s', 'prasoonpro' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									),
									'<span class="edit-link">',
									'</span>'
								);
							?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-## -->
				</div>
			</div>
		</div>
	</div>
</div>


