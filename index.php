<?php
get_header();

$title = get_field('blog_page_title', 'options') ?: 'Latest Casino News & Promotions ';
$intro = get_field('blog_page_intro', 'options') ?: '';

?>

<main class="container">
    <div class="page-content">
        <div class="breadcrumbs">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>

        <h2><?php echo $title; ?></h2>
        <p><?php echo $intro; ?></p>

        <div class="all-news">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="single-news">
                        <div class="news-img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">
                                <?php the_title(); ?>
                            </h3>
                            <p class="news-date">
                                <img src="<?php echo BETSPIN_DIR_URI . '/dist/img/calendar.png'; ?>" alt="Calendar"><?php echo get_the_date("d F Y"); ?>
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
            <?php wp_pagenavi(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>