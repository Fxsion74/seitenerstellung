<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<div id="home-page">
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-bg"></div>
        <div class="particles" id="particles"></div>
        <div class="floating-card"></div>
        <div class="floating-card"></div>
        <div class="hero-content">
            <h1><?php echo esc_html(get_theme_mod('hero_title', 'Websites die begeistern')); ?> <span>begeistern</span></h1>
            <p class="subtitle"><?php echo esc_html(get_theme_mod('hero_subtitle', 'NEXT LEVEL WEB EXPERIENCES')); ?></p>
        </div>
        <div class="scroll-indicator"></div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <h2 class="reveal">Digital Creator</h2>
            <p class="section-subtitle reveal">Wo Design auf Innovation trifft</p>
            <div class="about-content">
                <div class="about-text reveal">
                    <?php
                    $about_page = get_page_by_path('ueber-uns');
                    if ($about_page) {
                        echo apply_filters('the_content', $about_page->post_content);
                    }
                    ?>
                </div>
                <div class="about-visual reveal-scale">
                    <div class="morph-blob"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <h2 class="reveal">Services</h2>
            <p class="section-subtitle reveal">Maßgeschneiderte Lösungen für jeden Anspruch</p>
            <div class="services-grid">
                <?php
                $services = new WP_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' => 6,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

                if ($services->have_posts()) :
                    while ($services->have_posts()) : $services->the_post();
                        $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                        $color = get_post_meta(get_the_ID(), '_service_color', true);
                        ?>
                        <div class="service-card reveal" <?php if ($color) echo 'style="--service-color: ' . esc_attr($color) . '"'; ?>>
                            <div class="service-icon"><?php echo $icon ?: '⚡'; ?></div>
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <h2 class="reveal">Portfolio</h2>
            <p class="section-subtitle reveal">Scroll für eine Reise durch meine Arbeiten</p>
        </div>
        <div class="portfolio-container">
            <div class="portfolio-sticky">
                <div class="portfolio-track" id="portfolio-track">
                    <?php
                    $portfolio = new WP_Query(array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));

                    if ($portfolio->have_posts()) :
                        while ($portfolio->have_posts()) : $portfolio->the_post();
                            $category = get_post_meta(get_the_ID(), '_portfolio_category', true);
                            ?>
                            <div class="portfolio-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php endif; ?>
                                <div class="portfolio-content">
                                    <div class="portfolio-title"><?php the_title(); ?></div>
                                    <div class="portfolio-category"><?php echo esc_html($category); ?></div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <?php for ($i = 1; $i <= 4; $i++) : 
                    $number = get_theme_mod("stat_{$i}_number");
                    $label = get_theme_mod("stat_{$i}_label");
                    if ($number && $label) :
                ?>
                <div class="stat-item">
                    <div class="stat-number" data-target="<?php echo esc_attr($number); ?>">0</div>
                    <div class="stat-label"><?php echo esc_html($label); ?></div>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="reveal">Let's Create</h2>
            <p class="section-subtitle reveal">Bereit für das nächste Level?</p>
            <div class="contact-content reveal">
                <?php echo do_shortcode('[contact-form-7 id="1" title="Kontaktformular"]'); ?>
            </div>
        </div>
    </section>
</div>

<script>
// Dein gesamter JavaScript Code hier
// Oder ausgelagert in separate JS-Datei
</script>

<?php get_footer(); ?>