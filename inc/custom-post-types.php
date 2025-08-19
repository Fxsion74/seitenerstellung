<?php
// Portfolio Post Type
function webstudio_portfolio_post_type() {
    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio Item',
        'add_new' => 'Neues Projekt',
        'add_new_item' => 'Neues Portfolio Projekt',
        'edit_item' => 'Projekt bearbeiten',
        'new_item' => 'Neues Projekt',
        'view_item' => 'Projekt ansehen',
        'search_items' => 'Projekte suchen',
        'not_found' => 'Keine Projekte gefunden',
        'not_found_in_trash' => 'Keine Projekte im Papierkorb'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'webstudio_portfolio_post_type');

// Services Post Type
function webstudio_services_post_type() {
    $labels = array(
        'name' => 'Services',
        'singular_name' => 'Service',
        'add_new' => 'Neuer Service',
        'menu_name' => 'Services'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
        'hierarchical' => false,
    );

    register_post_type('services', $args);
}
add_action('init', 'webstudio_services_post_type');

// Taxonomies für Portfolio
function webstudio_portfolio_taxonomy() {
    register_taxonomy('portfolio_category', 'portfolio', array(
        'label' => 'Portfolio Kategorien',
        'rewrite' => array('slug' => 'portfolio-kategorie'),
        'hierarchical' => true,
    ));
}
add_action('init', 'webstudio_portfolio_taxonomy');