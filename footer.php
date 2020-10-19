<footer class="site-footer">
    <div class="footer-wrap container">
        <div class="footer-menus">
            <!-- Footer 1 -->
            <?php if (has_nav_menu('footer-1')) : ?>
                <div class="footer-col">

                    <h4><?php $menu = wp_get_nav_menu_name("footer-1");
                        echo $menu; ?></h4>
                    <?php
                    $args = array(
                        'theme_location' => 'footer-1',
                        'container' => 'div',
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            <?php endif; ?>
            <!-- Footer 1 -->

            <!-- Footer 2 -->
            <?php if (has_nav_menu('footer-2')) : ?>
                <div class="footer-col">
                    <h4><?php $menu = wp_get_nav_menu_name("footer-2");
                        echo $menu; ?></h4>
                    <?php
                    $args = array(
                        'theme_location' => 'footer-2',
                        'container' => 'div',
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            <?php endif; ?>
            <!-- Footer 2 -->

            <!-- Footer 3 -->
            <?php if (has_nav_menu('footer-3')) : ?>
                <div class="footer-col">
                    <h4><?php $menu = wp_get_nav_menu_name("footer-3");
                        echo $menu; ?></h4>
                    <?php
                    $args = array(
                        'theme_location' => 'footer-3',
                        'container' => 'div',
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            <?php endif; ?>
            <!-- Footer 3 -->

            <!-- Footer 4 -->
            <?php if (has_nav_menu('footer-4')) : ?>
                <div class="footer-col">
                    <h4><?php $menu = wp_get_nav_menu_name("footer-4");
                        echo $menu; ?></h4>
                    <?php
                    $args = array(
                        'theme_location' => 'footer-4',
                        'container' => 'div',
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            <?php endif; ?>
            <!-- Footer 4 -->
        </div>
        <div class="responsible-gaming">
            <?php
            // Check rows exists.
            if (have_rows('footer_image_field', 'options')) :

                // Loop through rows.
                while (have_rows('footer_image_field', 'options')) : the_row();

                    $image = get_sub_field('footer_image', 'options');
                    $link = get_sub_field('footer_image_link', 'options');

                    if ($link) {
                        echo '<div class="footer-img-wrap"><a href="' . $link . '"><img src="' . $image['url'] . '" alt="' . $image['alt'] . '"></a></div>';
                    } else {
                        echo '<div class="footer-img-wrap"><img src="' . $image['url'] . '" alt="' . $image['alt'] . '">s</div>';
                    }

                endwhile;

            endif;
            ?>
        </div>
        <div class="footer-text-field">
            <?php the_field('footer_text', 'options'); ?>
        </div>
    </div>
    <?php if (get_field('footer_copyrights', 'options')) : ?>
        <div class="footer-copyright">
            <div class="copyright-wrap container">
                <p class="copyright-text"><?php echo get_field('footer_copyrights', 'options'); ?> <span class="dmca"><?php the_field('dmca_field', 'options'); ?></span></p>
            </div>
        </div>
    <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>

</html>