<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Resonar
 * @since Resonar 1.0
 */
?>
		<?php get_sidebar(); ?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php printf('<a href="http://coinvention.io" rel="host_site">Coinvention.io</a> 2017' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
