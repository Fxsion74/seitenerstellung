<?php
// Customizer Settings
function webstudio_customize_register($wp_customize) {
    
    // Hero Section
    $wp_customize->add_section('webstudio_hero', array(
        'title' => 'Hero Bereich',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Websites die begeistern',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => 'Haupt-Titel',
        'section' => 'webstudio_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'NEXT LEVEL WEB EXPERIENCES',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => 'Untertitel',
        'section' => 'webstudio_hero',
        'type' => 'text',
    ));
    
    // Colors
    $wp_customize->add_section('webstudio_colors', array(
        'title' => 'WebStudio Farben',
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('primary_color', array(
        'default' => '#6366f1',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => 'Primärfarbe',
        'section' => 'webstudio_colors',
    )));
    
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#0ea5e9',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => 'Sekundärfarbe',
        'section' => 'webstudio_colors',
    )));
    
    // Statistics
    $wp_customize->add_section('webstudio_stats', array(
        'title' => 'Statistiken',
        'priority' => 40,
    ));
    
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("stat_{$i}_number", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control("stat_{$i}_number", array(
            'label' => "Statistik {$i} - Zahl",
            'section' => 'webstudio_stats',
            'type' => 'text',
        ));
        
        $wp_customize->add_setting("stat_{$i}_label", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control("stat_{$i}_label", array(
            'label' => "Statistik {$i} - Beschriftung",
            'section' => 'webstudio_stats',
            'type' => 'text',
        ));
    }
    
    // Contact Info
    $wp_customize->add_section('webstudio_contact', array(
        'title' => 'Kontakt Informationen',
        'priority' => 45,
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => 'E-Mail Adresse',
        'section' => 'webstudio_contact',
        'type' => 'email',
    ));
}
add_action('customize_register', 'webstudio_customize_register');

// Output Custom CSS
function webstudio_custom_css() {
    $primary_color = get_theme_mod('primary_color', '#6366f1');
    $secondary_color = get_theme_mod('secondary_color', '#0ea5e9');
    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo esc_attr($primary_color); ?>;
            --secondary: <?php echo esc_attr($secondary_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'webstudio_custom_css');