<div class="games-block-items <?php if (get_field('betspin_games_columns') == 5) {
                                    echo 'games-block-5';
                                } ?>">
    <?php
    if (have_rows('betspin_games_block')) :
        while (have_rows('betspin_games_block')) : the_row();
            $img = get_sub_field('betspin_games_image');
            $header = get_sub_field('betspin_games_header');
            $page = get_sub_field('betspin_games_page');

            $output = "<div class='games-block-item'><a href='{$page}'>";
            $output .= "<div class='games-block-wrap'>";
            $output .= "<div class='games-block-img'><img src='{$img['url']}' alt='{$img['alt']}'></div>";
            $output .= "<div class='games-block-header'><span>{$header}</span></div>";
            $output .= "</div></a></div>";

            echo $output;
        endwhile;
    endif;
    ?>
</div>