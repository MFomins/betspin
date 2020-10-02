<div class="games-block-items">
    <?php
    if (have_rows('betspin_games_block')) :
        while (have_rows('betspin_games_block')) : the_row();
            $img = get_sub_field('betspin_games_image');
            $header = get_sub_field('betspin_games_header');
            $page = get_sub_field('betspin_games_page');

            $output = "<div class='games-block-item'>";
            $output .= "<div class='games-block-wrap'>";
            $output .= "<div class='games-block-img'><img src='{$img['url']}' alt='{$img['alt']}'></div>";
            $output .= "<div class='games-block-header'><a href='{$page}'>{$header}</a></div>";
            $output .= "</div></div>";

            echo $output;
        endwhile;
    endif;
    ?>
</div>