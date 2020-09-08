<?php

add_shortcode('betspin_posts', 'show_posts');

function show_posts($atts)
{
    $atts = shortcode_atts(
        array(
            'limit' => get_option('posts_per_page'),
        ),
        $atts,
        'show_posts'
    );


    $loop_args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['limit'],
    );

    $loop = new WP_Query($loop_args);

    ob_start();
?>

    <div class="all-posts">
        <?php
        while ($loop->have_posts()) :

            $loop->the_post();

        endwhile;
        wp_reset_postdata();
        ?>
    </div>

<?php
    return ob_get_clean();
}
