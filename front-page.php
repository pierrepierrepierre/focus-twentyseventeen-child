<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
global $gallerysticked;

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php // get_template_part( 'template-parts/header/header', 'image' ); ?>

		<div class="site-branding">
			<div class="wrap">
				<?php the_custom_logo(); ?>

				<div class="site-branding-text">

					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>

					<div class="navigation-top">
						<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>

						<!-- <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
							<?php // wp_nav_menu( array(
							// 'theme_location' => 'top',
							// 'menu_id'        => 'top-menu',
							//) ); ?>
						</nav>
						-->
					</div>
				</div>
			</div>
		</div>


		<!-- NAVIGATION INIT
		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php // get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
		<!--	</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */

	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && (has_post_thumbnail( get_queried_object_id() ) || get_post_gallery(get_queried_object_id()) )) :
		echo '<div class="single-featured-image-header">';
		// if( !get_post_gallery(get_queried_object_id()) ){
		if( get_post_format(get_queried_object_id()) == 'gallery' ){
			echo get_post_gallery(get_queried_object_id());
			$gallerysticked = true;
		} else if( get_post_format(get_queried_object_id()) == 'image' ) {
			echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		}
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
