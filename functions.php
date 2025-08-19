<?php
// Theme Setup
function webstudio_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    
    // Navigation
    register_nav_menus(array(
        'primary' => 'Hauptmenü',
    ));
}
add_action('after_setup_theme', 'webstudio_theme_setup');

// Scripts und Styles
function webstudio_enqueue_scripts() {
    // CSS
    wp_enqueue_style('webstudio-style', get_stylesheet_uri());
    wp_enqueue_style('webstudio-animations', get_template_directory_uri() . '/assets/css/animations.css', array(), '1.0.0');
    
    // JavaScript
    wp_enqueue_script('webstudio-animations', get_template_directory_uri() . '/assets/js/animations.js', array(), '1.0.0', true);
    
    // Conditional loading für Homepage
    if (is_front_page()) {
        wp_enqueue_script('webstudio-particles', get_template_directory_uri() . '/assets/js/particles.js', array(), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'webstudio_enqueue_scripts');

// Include custom functionality
require_once get_template_directory() . '/inc/custom-fields.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/theme-options.php';
// Fallback Menu für Navigation
function webstudio_fallback_menu() {
    echo '<ul class="nav-links">';
    echo '<li><a href="' . home_url() . '">Start</a></li>';
    echo '<li><a href="' . home_url() . '#about">Über</a></li>';
    echo '<li><a href="' . home_url() . '#services">Services</a></li>';
    echo '<li><a href="' . home_url() . '#portfolio">Portfolio</a></li>';
    echo '<li><a href="' . home_url() . '#contact">Kontakt</a></li>';
    echo '</ul>';
}

// Custom Logo Support
function webstudio_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));
}
add_action('after_setup_theme', 'webstudio_custom_logo_setup');

// Admin Styles
function webstudio_admin_styles() {
    echo '<style>
        .postbox .hndle { cursor: default; }
        #portfolio_details .form-table th { width: 150px; }
        #service_details .form-table th { width: 150px; }
        .form-table input[type="color"] { width: 60px; height: 40px; border: none; }
    </style>';
}
add_action('admin_head', 'webstudio_admin_styles');

// Search Form
function webstudio_search_form($form) {
    $form = '<form class="search-form" method="get" action="' . home_url('/') . '">
        <input type="search" class="search-field" placeholder="Suchen..." value="' . get_search_query() . '" name="s" />
        <button type="submit" class="search-submit">🔍</button>
    </form>';
    return $form;
}
add_filter('get_search_form', 'webstudio_search_form');