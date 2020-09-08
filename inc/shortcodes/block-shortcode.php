<?php

add_shortcode('betspin_casino_block', 'casino_block');

function casino_block($atts)
{
    ob_start();
?>

    <div class="casino-deal-block">
        <?php
        include BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/blocks/casino-deal-block.php';
        ?>
    </div>

<?php
    return ob_get_clean();
}
