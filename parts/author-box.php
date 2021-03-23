<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$author_id = get_the_author_meta('ID');

$author_name = get_field('betspin_author_name', 'user_' . $author_id);

$author_information = get_field('betspin_author_information', 'user_' . $author_id);

$author_image = get_field('betspin_author_image', 'user_' . $author_id);

$author_twitter = get_field('betspin_author_twitter', 'user_' . $author_id);

$author_linkedin = get_field('betspin_author_linkedin', 'user_' . $author_id);

$author_instagram = get_field('betspin_author_instagram', 'user_' . $author_id);

?>
<?php if ($author_information) : ?>
    <div class="author-box container">
        <div class="inner-author-box">
            <?php if ($author_image) : ?>
                <img class="author-img" src="<?php echo $author_image["url"]; ?>" alt="<?php echo $author_image["alt"]; ?>">
            <?php endif; ?>
            <span class="author-name"><?php echo $author_name; ?></span>
            <p class="author-information">
                <?php echo $author_information; ?>
            </p>
            <div class="author-socials">
                <div class="social-icons">
                    <?php if ($author_twitter) : ?>
                        <a href="<?php echo $author_twitter; ?>"><img class="twitter-icon" height="20" width="20" src="<?php echo BETSPIN_DIR_URI . '/dist/img/twitter.png' ?>" alt="twitter-logo"></img></a>
                    <?php endif; ?>
                    <?php if ($author_linkedin) : ?>
                        <a href="<?php echo $author_linkedin; ?>"><img class="twitter-icon" height="20" width="20" src="<?php echo BETSPIN_DIR_URI . '/dist/img/linkedin.png' ?>" alt="linkedin-logo"></img></a>
                    <?php endif; ?>
                    <?php if ($author_instagram) : ?>
                        <a href="<?php echo $author_instagram; ?>"><img class="inst-icon" height="20" width="20" src="<?php echo BETSPIN_DIR_URI . '/dist/img/inst.png' ?>" alt="instagram-logo"></img></a>
                    <?php endif; ?>
                </div>
                <a href="<?php echo get_author_posts_url($author_id); ?>" class="author-page"><?php _e('Read more from author &#10141'); ?></a>
            </div>

        </div>
    </div>
<?php endif; ?>