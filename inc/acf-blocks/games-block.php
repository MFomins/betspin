<div class="games-block-item">
    <div class="games-block-wrap">
        <div class="games-block-img">
            <?php
            $image = get_field('betspin_games_image');

            echo "<img src='{$image['url']}' alt='{$image['alt']}'>"
            ?>
        </div>
        <div class="games-block-header">
            <a href="<?php the_field('betspin_games_page'); ?>"><?php the_field('betspin_games_header'); ?></a>
        </div>
    </div>
</div>