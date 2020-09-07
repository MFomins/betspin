<?php

add_shortcode('betspin_casino_block', 'casino_block');

function casino_block($atts)
{
    ob_start();
?>

    <div class="casino-blokc">
        <?php
        while ($loop->have_posts()) :

            $loop->the_post();

            echo 'asd';

        endwhile;
        wp_reset_postdata();
        ?>
    </div>

<?php
    return ob_get_clean();
}
