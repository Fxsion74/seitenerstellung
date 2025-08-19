<?php get_header(); ?>

<main class="main-content single-post">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="post-single">
                <header class="post-header">
                    <h1 class="post-title reveal"><?php the_title(); ?></h1>
                    
                    <div class="post-meta reveal">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-author">von <?php the_author(); ?></span>
                        <?php if (has_category()) : ?>
                            <span class="post-categories">in <?php the_category(', '); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-featured-image reveal-scale">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </header>
                
                <div class="post-content reveal">
                    <?php the_content(); ?>
                </div>
                
                <?php if (has_tag()) : ?>
                    <div class="post-tags reveal">
                        <h3>Tags:</h3>
                        <?php the_tags('<span class="tag">', '</span><span class="tag">', '</span>'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="post-navigation reveal">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '← %title'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', '%title →'); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>