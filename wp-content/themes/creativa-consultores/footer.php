<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Creativa Consultores
 */
?>

	</div><!-- #content -->
	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="container">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'creativa-consultores' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'creativa-consultores' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %2$s by %1$s', 'creativa-consultores' ), 'aThemes', '<a href="http://athemes.com/theme/creativa-consultores">Creativa Consultores</a>' ); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
