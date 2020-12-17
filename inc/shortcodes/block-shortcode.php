<?php

add_shortcode('betspin_casino_block', 'casino_block');

function casino_block($atts)
{
    ob_start();
?>

    <div class="casino-deal-block" style="background-image:url(<?php echo BETSPIN_DIR_URI . '/dist/img/bonus-block.jpg'; ?>);">
        <a href="/bonuses/" class="deal-button">Click here</a>
        <div class="block-text">
            To get your bonuses <br> and start playing
        </div>
    </div>

<?php
    return ob_get_clean();
}
