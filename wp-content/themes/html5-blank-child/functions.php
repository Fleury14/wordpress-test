<?php 

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 11 );
add_theme_support('post-thumbnails');

function my_theme_enqueue_styles() {

    $parent_style = 'html5-blank';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'html5-blank-child',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

global $background_image;
$background_image = 'ryu.jpg';

?>