<?php

// body class
require get_template_directory() . '/inc/extras.php';

/**
* Returns the path to the asset
* @param string
*
* @return string
*/
function myAsset($asset){
    echo get_stylesheet_directory_uri() .'/dist/'. $asset;
}

// load parent scripts & styles
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style', 99 );
function enqueue_parent_theme_style() {
    //custom styles
    wp_enqueue_style('child314css', get_stylesheet_directory_uri() . '/dist/css/app.css', true);
    wp_enqueue_script('child314js', get_stylesheet_directory_uri() . '/dist/js/app.js', false, '1', 'all');

    //WP styles
    wp_enqueue_style('main-parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style('main-child-style', get_stylesheet_directory_uri().'/style.css' );
}

// image sizes
add_action('after_setup_theme', 'image_sizes');
function image_sizes(){
    add_image_size('fav1', 32, 32, true);
    add_image_size('fav2', 180, 180, true);
    add_image_size('fav3', 196, 196, true);
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

// ACF / OPTIONS PAGE
if (function_exists('acf_add_options_page')) {
	// Main page ACF Option
    $parent = acf_add_options_page(array(
        'page_title'    => '314 Theme',
        'menu_title'    => '314 Theme',
        'redirect'      => false
    ));

    // Subpage ACF Option
    acf_add_options_sub_page(array(
        'page_title'    => 'Ustawienia SEO',
        'menu_title'    => 'SEO',
        'parent_slug'   => $parent['menu_slug'],
    ));

    // Subpage ACF Option
    acf_add_options_sub_page(array(
        'page_title'    => 'Ustawienia stopki',
        'menu_title'    => 'Footer',
        'parent_slug'   => $parent['menu_slug'],
    ));
}

if( function_exists('acf_add_local_field_group') ):

    /* OGÓLNE */
    acf_add_local_field_group(array(
        'key' => 'group_5b59adfe3b40c',
        'title' => 'Ogólne',
        'fields' => array(
            array(
                'key' => 'field_5b59af2104773',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5b59aecf04770',
                'label' => 'Adres',
                'name' => 'adres',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5b59aefe04771',
                'label' => 'Tel',
                'name' => 'tel',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5b59af0204772',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-314-theme',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));    
    
    /* SEO */
    acf_add_local_field_group(array(
        'key' => 'group_5d416e3966e93',
        'title' => 'SEO',
        'fields' => array(
            array(
                'key' => 'field_5d416e43e2b11',
                'label' => 'Header text',
                'name' => 'header_text',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 4,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5d416e67e2b14',
                'label' => 'Body text',
                'name' => 'body_text',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 4,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5d416e66e2b13',
                'label' => 'Footer text',
                'name' => 'footer_text',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 4,
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-seo',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    /* STOPKA */
    acf_add_local_field_group(array(
        'key' => 'group_5b59af2d3c148',
        'title' => 'Stopka',
        'fields' => array(
            array(
                'key' => 'field_5d35a4145dfa4',
                'label' => 'Logo 2',
                'name' => 'logo_2',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5d35a4055dfa3',
                'label' => 'Stopka',
                'name' => 'stopka',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5ba7b55751463',
                'label' => 'Formularz',
                'name' => 'formularz',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5c4ce5afac241',
                'label' => 'Umów wizyte',
                'name' => 'umow_wizyte',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5c4ce5bbac242',
                'label' => 'Mapy',
                'name' => 'mapy',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5c4ce5caac243',
                        'label' => 'Mapa',
                        'name' => 'mapa',
                        'type' => 'google_map',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'center_lat' => '',
                        'center_lng' => '',
                        'zoom' => '',
                        'height' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_5b59af475120b',
                'label' => 'Podpis stopka',
                'name' => 'podpis_stopka',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-footer',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));    
endif;