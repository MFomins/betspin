<footer class="site-footer">
    <div class="footer-wrap container">
        <div class="footer-menus">
            <!-- Footer 1 -->
            <?php if (has_nav_menu('footer-1')) : ?>
                <div class="footer-col">

                    <span><?php $menu = wp_get_nav_menu_name("footer-1");
                            echo $menu; ?></span>
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
                    <span><?php $menu = wp_get_nav_menu_name("footer-2");
                            echo $menu; ?></span>
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
                    <span><?php $menu = wp_get_nav_menu_name("footer-3");
                            echo $menu; ?></span>
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
                    <span><?php $menu = wp_get_nav_menu_name("footer-4");
                            echo $menu; ?></span>
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
                        echo '<div class="footer-img-wrap"><img src="' . $image['url'] . '" alt="' . $image['alt'] . '"></div>';
                    }

                endwhile;

            endif;
            ?>
        </div>
        <div class="footer-text-socials">
            <div class="footer-text">
                <?php the_field('footer_text', 'options'); ?>
            </div>
            <div class="footer-socials">
                <a href="https://www.facebook.com/betspinofficial" target="_blank"><img src="<?php echo BETSPIN_DIR_URI . '/dist/img/socials-facebook.png'; ?>" alt="facebook"></a>
                <a href="https://www.youtube.com/channel/UC3Q1xwrFgEYbmo3ZQOXGpsw" target="_blank"><img src="<?php echo BETSPIN_DIR_URI . '/dist/img/socials-youtube.png'; ?>" alt="youtube"></a>
                <a href="https://twitter.com/betspinofficial" target="_blank"><img src="<?php echo BETSPIN_DIR_URI . '/dist/img/socials-twitter.png'; ?>" alt="twitter"></a>
                <a href="https://www.instagram.com/betspin_official/" target="_blank"><img src="<?php echo BETSPIN_DIR_URI . '/dist/img/socials-instagram.png'; ?>" alt="instagram"></a>
            </div>
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