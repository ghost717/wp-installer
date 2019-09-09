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

// CUSTOM POST TYPES
function post_type_zabiegi(){
    $labels = array(
        'name' => _x('Zabiegi', 'Zabiegi', 'webs'),
        'singular_name' => _x('Zabieg', 'Zabieg', 'webs'),
    );

    $args = array(
        'label' => __('Zabieg', 'webs'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        // 'taxonomies' => array('category'),
    );
    
    register_post_type('zabieg', $args);

    register_taxonomy(
        "zabiegi",
        array("zabieg"),
        array(
            "hierarchical" => true,
            "label" => "Kategorie",
            "singular_label" => "Kategoria",
            "rewrite" => true
            )
    );
}
add_action('init', 'post_type_zabiegi', 0);

function post_type_team(){
    $labels = array(
        'name' => _x('Personel', 'Personel', 'webs'),
        'singular_name' => _x('Personel', 'Personel', 'webs'),
    );

    $args = array(
        'label' => __('Personel', 'webs'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        // 'taxonomies' => array('category'),
    );
    
    register_post_type('personel', $args);

    register_taxonomy(
        "team",
        array("personel"),
        array(
            "hierarchical" => true,
            "label" => "Kategorie",
            "singular_label" => "Kategoria",
            "rewrite" => true
            )
    );
}
add_action('init', 'post_type_team', 0);