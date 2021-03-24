<?php


function payment_methods_list($atts)
{
    
    $atts = shortcode_atts(
        array(
            'limit' => -1,
            'id'  => '',
            'updated' => '',
            'categories' => '',
            'type' => 'payment_methods',
            'style' => ''
        ),
        $atts,
        'payment_methods_list'
    );

    $id = $atts['id'];
    $id = explode(',', $id);


    $loop_args = array(
        'post_type' => 'payment_methods',
        'posts_per_page' => $atts['limit'],
        'orderby' => 'post__in',
    );

    if (!empty($atts['id'])) {
        $loop_args['post__in'] = $id;
    }

        $loop = new WP_Query($loop_args);

    ob_start();
?>

    <div class="payment-methods-list">

        <?php
        while ($loop->have_posts()) :

            $loop->the_post();

            include BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/payments-list-content.php';
            
        endwhile;
        wp_reset_postdata();
        ?>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('payments-list', 'payment_methods_list' );
