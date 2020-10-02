<div class="g-block-items">
    <?php
    if (have_rows('betspin_about_us_block')) :
        while (have_rows('betspin_about_us_block')) : the_row();
            $img = get_sub_field('betspin_block_image');
            $header = get_sub_field('betspin_block_header');
            $text = get_sub_field('betspin_block_text');

            $output = "<div class='g-block-item'>";
            $output .= "<div class='g-block-wrap'>";
            $output .= "<div class='g-block-img'><img src='{$img['url']}' alt='{$img['alt']}'></div>";
            $output .= "<div class='g-block-header'><h4>{$header}</h4></div>";
            $output .= "<div class='g-block-text'><p>{$text}</p></div>";
            $output .= "</div></div>";

            echo $output;
        endwhile;
    endif;
    ?>
</div>