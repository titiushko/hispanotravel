<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Creativa Consultores
 */

$DOMINIO = rtrim(network_home_url(), '/');
?>

	</div><!-- #content -->
	<?php /*get_sidebar('footer');*/ ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="container">
				<div class="text-center" style="color: #ffffff">
					<div class="row">
						<div class="col-sm-12">
						 	<img src="<?= $DOMINIO; ?>/wp-content/uploads/2015/09/powered_creativa.png" alt="powered_creativa" />
							<br>
							<a href="https://twitter.com/hispano_travel" target="_blank"><img src="<?= $DOMINIO; ?>/wp-content/themes/creativa-consultores/images/twitter_icon.png"/></a>
							<a href="" target="_blank"><img src="<?= $DOMINIO; ?>/wp-content/themes/creativa-consultores/images/google_icon.png"/></a>
							<a href="https://www.facebook.com/hispano.travel.alexandria" target="_blank"><img src="<?= $DOMINIO; ?>/wp-content/themes/creativa-consultores/images/facebook_icon.png"/></a>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
