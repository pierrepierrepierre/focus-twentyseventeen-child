<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

global $gallerysticked;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php

		if ( is_single() ) { ?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' );	?>
			</header><!-- .entry-header -->
		<?php
		}

		?>


	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'focus-post-thumbnail' ); ?>
				<?php the_title( '<span class="entry-title">', '</span>' ); ?>
			</a>
			<?php echo get_the_tag_list( '<span class="tags">', ', ', '</span>' ); ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content<?php if($gallerysticked == true){echo ' removed-gallery';} ?>">
		<?php
		if ( is_single() || is_category('News') ) {
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()
		) );
} elseif (is_home() && ''== get_the_post_thumbnail()){
	the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	<p class="excerpt"> <?php $excerpt = get_the_excerpt();  if($excerpt != "") {echo $excerpt . ' | ';} ?>
		<a href="<?php the_permalink(); ?>">more ...<a/> </p>
		<?php twentyseventeen_edit_link();
}

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
