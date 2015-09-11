<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Creativa Consultores
 */
$DOMINIO = rtrim(network_home_url(), '/');
$nombre_sitio = explode(' ', get_bloginfo('name', 'display'));
//print_r($nombre_sitio);
$titulo_sitio = '<span class="titulo-parte1">'.$nombre_sitio[0].'</span><span class="titulo-parte2">'.strtolower($nombre_sitio[1]).'</span>';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
  }
</style>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'creativa-consultores' ); ?></a>

<?php if ( get_header_image() ) :?>
	<header id="masthead" class="site-header has-banner" role="banner">
<?php else : ?>
	<header id="masthead" class="site-header" role="banner">
<?php endif; ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="container">	
				<button class="menu-toggle btn"><i class="fa fa-bars"></i></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				<div class="titulo-sitio"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?= $titulo_sitio; ?></a></div>
			</div>	
			<div id="SlideHispanotravel" class="carousel slide" data-ride="carousel">
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active"> <img src="<?= $DOMINIO; ?>/wp-content/uploads/2015/09/head_banner_01_shadow.jpg" alt="hispanotravel"> </div>
			    <div class="item"> <img src="<?= $DOMINIO; ?>/wp-content/uploads/2015/09/head_banner_02_shadow.jpg" alt="hispanotravel"> </div>
			    <div class="item"> <img src="<?= $DOMINIO; ?>/wp-content/uploads/2015/09/head_banner_03_shadow.jpg" alt="hispanotravel"> </div>
			    <div class="item"> <img src="<?= $DOMINIO; ?>/wp-content/uploads/2015/09/head_banner_04_shadow.jpg" alt="hispanotravel"> </div>
			    <div class="item"> <img src="<?= $DOMINIO; ?>/wp-content/uploads/2015/09/head_banner_05_shadow.jpg" alt="hispanotravel"> </div>
			    <div class="item"> <img src="<?= $DOMINIO; ?>/wp-content/uploads/2015/09/head_banner_06_shadow.jpg" alt="hispanotravel"> </div>
			  </div>
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#SlideHispanotravel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#SlideHispanotravel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
			<div class="site-buscar">
				<div class="buscar"><?php get_search_form(); ?></div>
			</div>
			<?php if ( display_header_text() ) : ?>
				<!-- <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->
				<h2 class="site-description descripcion-sitio"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</nav><!-- #site-navigation -->
		<div class="container">
			<div class="site-branding">
				<?php if ( get_theme_mod('site_logo') ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
				<?php else : ?>
				<?php endif; ?>
			</div>
		</div>
		
	<?php if ( is_home() ) : ?>
		<div class="sidebar-toggle"><i class="fa fa-plus"></i></div>
	<?php endif; ?>
	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation clearfix">
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'container', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
		</nav>
		<div class="social-toggle"><i class="fa fa-facebook"></i></div>
	<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content container">