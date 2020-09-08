<?php

add_shortcode('betspin_deposit_block', 'deposit_block');

function deposit_block($atts)
{
    ob_start();
?>

    <div class="casino-deposit-block">
        <?php
        include BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/blocks/first-deposit-block.php';
        ?>
    </div>

<?php
    return ob_get_clean();
}
