<?php get_header(); ?>

<main class="container with-sidebar">
    <div class="page-content">
        <?php while (have_posts()) : the_post(); ?>
            <div class="post-content">
                <div class="header-elements">
                    <div class="header-elements-left">
                        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/live-casinos.png"; ?>" alt="Cards">
                        <h1><?php echo the_title(); ?></h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                </div>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
        <div class="post-related-posts">
            <h2 class="custom-header"><img src="<?php echo BETSPIN_DIR_URI . "/dist/img/blog.png"; ?>" alt="Blog image">Related Blog posts</h2>
            <?php echo do_shortcode('[betspin_related_posts]'); ?>
        </div>
    </div>
    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>