<?php

add_shortcode('betspin_posts', 'show_posts');

function show_posts($atts)
{
    $loop_args = array(
        'post_type' => 'post',
        'posts_per_page' => get_option('posts_per_page'),
    );

    $loop = new WP_Query($loop_args);

    ob_start();
?>

    <div class="all-posts">
        <?php
        while ($loop->have_posts()) :

            $loop->the_post();

            include BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/posts-shortcode-content.php';

        endwhile;
        wp_reset_postdata();
        ?>
    </div>

<?php
    return ob_get_clean();
}
