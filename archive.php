<?php get_header(); ?>

<main class="main-content archive-page">
    <div class="container">
        <header class="archive-header">
            <h1 class="archive-title reveal">
                <?php
                if (is_category()) {
                    echo 'Kategorie: ' . single_cat_title('', false);
                } elseif (is_tag()) {
                    echo 'Tag: ' . single_tag_title('', false);
                } elseif (is_author()) {
                    echo 'Autor: ' . get_the_author();
                } elseif (is_post_type_archive('portfolio')) {
                    echo 'Portfolio';
                } elseif (is_post_type_archive('services')) {
                    echo 'Services';
                } else {
                    echo 'Archiv';
                }
                ?>
            </h1>
            
            <?php if (is_category() && category_description()) : ?>
                <div class="archive-description reveal">
                    <?php echo category_description(); ?>
                </div>
            <?php endif; ?>
        </header>
        
        <?php if (have_posts()) : ?>
            <div class="archive-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="archive-item reveal">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="item-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="item-content">
                            <h2 class="item-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <?php if (get_post_type() === 'portfolio') : ?>
                                <div class="portfolio-meta">
                                    <?php
                                    $category = get_post_meta(get_the_ID(), '_portfolio_category', true);
                                    if ($category) :
                                    ?>
                                        <span class="portfolio-category"><?php echo esc_html($category); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="item-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php echo (get_post_type() === 'portfolio') ? 'Projekt ansehen' : 'Weiterlesen'; ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php
            the_posts_pagination(array(
                'prev_text' => '← Vorherige',
                'next_text' => 'Nächste →',
            ));
            ?>
            
        <?php else : ?>
            <div class="no-posts reveal">
                <h2>Keine Einträge gefunden</h2>
                <p>Es wurden keine Einträge in diesem Archiv gefunden.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>