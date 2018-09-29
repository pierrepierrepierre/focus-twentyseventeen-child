<?php

// Show only items from the category WORKS on the frontpage
add_action('pre_get_posts', 'ad_filter_categories');
function ad_filter_categories($query) {
    if ($query->is_main_query() && is_home()) {
        // $query->set('category_name','works');
		$query->set('post__in', get_option( 'sticky_posts' ) );
    }
}


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


add_image_size( 'wide', 1200, 9999 );
add_image_size('focus-post-thumbnail', 320, 240, TRUE );


add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'wide' => __( 'Wide' ),
		'focus-post-thumbnail' => __( 'Thumbnail 4:3' ),
    ) );
}
