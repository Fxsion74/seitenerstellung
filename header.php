<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Custom Cursor -->
<div class="cursor"></div>
<div class="cursor-follower"></div>

<!-- Navigation -->
<nav id="navbar">
    <div class="nav-container">
        <div class="logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
        </div>
        
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'nav-links',
            'container' => false,
            'fallback_cb' => 'webstudio_fallback_menu'
        ));
        ?>
        
        <!-- Mobile Menu Button -->
        <button class="mobile-menu-toggle" id="mobile-menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobile-menu-overlay">
    <div class="mobile-menu-content">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'mobile-nav-links',
            'container' => false,
            'fallback_cb' => 'webstudio_fallback_menu'
        ));
        ?>
    </div>
</div>