<div class="games-block-item">
    <div class="games-block-wrap">
        <div class="games-block-img">
            <?php
            $image = get_field('betspin_games_image');

            echo "<img src='{$image['url']}' alt='{$image['alt']}'>"
            ?>
        </div>
        <div class="games-block-header">
            <h4><?php the_field('betspin_games_header'); ?></h4>
        </div>
    </div>
</div>