<?php get_header(); ?>

<main class="container with-sidebar">
    <div class="page-content">
        <?php while (have_posts()) : the_post(); ?>
            <div class="post-content">
                <div class="header-elements">
                    <div class="header-elements-left">
                        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/header-cards.png"; ?>" alt="Cards">
                        <h2><?php echo the_title(); ?></h2>
                    </div>
                    <div class="header-elements-right">
                        <div class="single-post-date">
                            <p>Published by Betspin<span><?php the_date("d.m.y"); ?></span></p>
                        </div>
                        <div class="post-share">
                            <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>">
                                <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/facebook.png"; ?>" alt="">
                            </a>
                            <a class="twitter-share-button" href="https://twitter.com/intent/tweet">
                                <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/twitter.png"; ?>" alt="Twitter">
                            </a>
                        </div>
                    </div>
                </div>
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