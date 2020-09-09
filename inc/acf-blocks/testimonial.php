<div class="g-block-wrap">
    <div class="g-block-img">
        <?php
        $image = get_field('betspin_block_image');

        echo "<img src='{$image['url']}' alt='{$image['alt']}'>"
        ?>
    </div>
    <div class="g-block-header">
        <h4><?php the_field('betspin_block_header'); ?></h4>
    </div>
    <div class="g-block-text">
        <p><?php the_field('betspin_block_text'); ?></p>
    </div>
</div>