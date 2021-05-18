<?php

/**
 * The template for displaying author page.
 * 
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$curauth_id = $curauth->ID;

$author_name = get_field('betspin_author_name', 'user_' . $curauth_id);

$author_information = get_field('betspin_author_information', 'user_' . $curauth_id);

$author_image = get_field('betspin_author_image', 'user_' . $curauth_id);

$author_twitter = get_field('betspin_author_twitter', 'user_' . $curauth_id);

$author_linkedin = get_field('betspin_author_linkedin', 'user_' . $curauth_id);

$author_instagram = get_field('betspin_author_instagram', 'user_' . $curauth_id);

?>

<?php get_header(); ?>

<main class="site-main" role="main">
    <div class="author-content container">
        <div class="author-box" <?php if (!$author_image) echo 'style="margin:40px auto"'; ?>>
            <div class="inner-author-box">
                <?php if ($author_image) : ?>
                    <img class="author-img" src="<?php echo $author_image["url"]; ?>" alt="<?php echo $author_image["alt"]; ?>">
                <?php endif; ?>
                <span class="author-name"><?php echo $author_name; ?></span>
                <p class="author-information">
                    <?php echo $author_information; ?>
                </p>
                <div class="author-footer-socials">
                    <?php if ($author_twitter) : ?>
                        <img class="twitter-author-icon" height="20" width="20" src="<?php echo BETSPIN_DIR_URI . '/dist/img/twitter.svg' ?>" alt="twitter-logo"></img></a>
                    <?php endif; ?>
                    <?php if ($author_linkedin) : ?>
                        <a href="<?php echo $author_linkedin; ?>"><img class="linked-author-icon" height="20" width="20" src="<?php echo BETSPIN_DIR_URI . '/dist/img/linkedin.svg' ?>" alt="linkedin-logo"></img></a>
                    <?php endif; ?>
                    <?php if ($author_instagram) : ?>
                        <a href="<?php echo $author_instagram; ?>"><img class="inst-author-icon" height="20" width="20" src="<?php echo BETSPIN_DIR_URI . '/dist/img/instagram.svg' ?>" alt="instagram-logo"></img></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <h3><?php _e('Author Posts'); ?></h3>
        <div class="author-work">
            <?php
            $args = array(
                'post_type' => array('post', 'page', 'casino-review'),
                'author' => $curauth_id,
                'posts_per_page' => -1,
            );

            $loop = new WP_Query($args);

            if ($loop->have_posts()) {
                while ($loop->have_posts()) {
                    $loop->the_post();
            ?>
                    <a href="<?php the_permalink(); ?>" class="author-single-post">
                        <div class="work-title">
                            <?php the_title(); ?>
                        </div>
                        <div class="work-date">
                            <?php the_date(); ?>
                        </div>
                    </a>
            <?php
                } // end while
            } // end if
            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>