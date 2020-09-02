<?php get_header(); ?>

<main class="container with-sidebar">
    <div class="page-content">
        <?php while (have_posts()) : the_post(); ?>
            <div class="post-content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
        <div class="post-share">
            FB / TWITTER
        </div>
        <div class="related-posts">

            <h2>Related Blog posts</h2>

        </div>
    </div>
    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</main>


<?php get_footer(); ?>