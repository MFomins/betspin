<?php

get_header();

?>

<main class="container">
    <div class="page-content">

        <?php if (function_exists('rank_math_the_breadcrumbs')) : ?>
            <div class="breadcrumbs">
                <?php rank_math_the_breadcrumbs(); ?>
            </div>
        <?php endif; ?>

        <div class="all-news">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="single-news-article">
                        <div class="news-img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">
                                <?php the_title(); ?>
                            </h3>
                            <p class="news-date">
                                <img src="<?php echo BETSPIN_DIR_URI . '/dist/img/calendar.svg'; ?>" alt="Calendar"><?php echo get_the_date("d F Y"); ?>
                            </p>
                            <div class="news-read-more">
                                <a href="<?php the_permalink(); ?>"><?php _e('Read more »', 'betspin-theme'); ?></a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('There is no posts added to the page.', 'betspin-theme'); ?></p>
            <?php endif; ?>
            
            <?php if (function_exists('wp_pagenavi')) : ?>
                <?php wp_pagenavi(); ?>
            <?php endif; ?>

        </div>
    </div>
</main>
<?php get_footer(); ?>