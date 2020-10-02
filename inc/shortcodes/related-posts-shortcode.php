<?php

add_shortcode('betspin_related_posts', 'related_posts');

function related_posts($atts)
{
    $atts = shortcode_atts(
        array(
            'limit' => 3,
        ),
        $atts,
        'related_posts'
    );


    $loop_args = array(
        'post_type' => 'post',
        'category__in' => wp_get_post_categories(get_the_ID()),
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'date',
        'posts_per_page' => $atts['limit'],
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
