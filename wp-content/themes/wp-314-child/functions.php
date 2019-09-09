<?php

// load parent scripts & styles
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style', 99 );
function enqueue_parent_theme_style() {
    wp_enqueue_style('child314css', get_stylesheet_directory_uri() . '/dist/css/app.css', true);
    wp_enqueue_script('child314js', get_stylesheet_directory_uri() . '/dist/js/app.js', false, '1', 'all');
    wp_enqueue_style('main-parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style('main-child-style', get_stylesheet_directory_uri().'/style.css' );
}

// image sizes
add_action('after_setup_theme', 'image_sizes');
function image_sizes(){
    add_image_size('fullhd', 1920, 1080, true);
    add_image_size('thumb600', 600, 600, true);
}
