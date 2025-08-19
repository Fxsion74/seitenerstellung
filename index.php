<?php get_header(); ?>

<main class="main-content">
    <div class="container">
        <section class="content-area">
            <?php if (have_posts()) : ?>
                <h1 class="page-title">
                    <?php
                    if (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_author()) {
                        echo 'Autor: ' . get_the_author();
                    } elseif (is_day()) {
                        echo 'Archiv: ' . get_the_date();
                    } elseif (is_month()) {
                        echo 'Archiv: ' . get_the_date('F Y');
                    } elseif (is_year()) {
                        echo 'Archiv: ' . get_the_date('Y');
                    } else {
                        echo 'Blog';
                    }
                    ?>
                </h1>

                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="post-card reveal">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="post-meta">
                                    <span class="post-date"><?php echo get_the_date(); ?></span>
                                    <span class="post-author">von <?php the_author(); ?></span>
                                </div>
                                
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more">Weiterlesen</a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php
                // Pagination
                the_posts_pagination(array(
                    'prev_text' => '← Vorherige',
                    'next_text' => 'Nächste →',
                ));
                ?>

            <?php else : ?>
                <div class="no-posts">
                    <h2>Keine Beiträge gefunden</h2>
                    <p>Es wurden keine Beiträge gefunden. Versuchen Sie es mit anderen Suchbegriffen.</p>
                </div>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>