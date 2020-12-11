<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-T7524QK');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    if (isset($_GET['aweber']) && $_GET['aweber'] == 'success') {
        site_popup();
    }
    ?>
    <div class="slideout-menu">
        <?php if (has_nav_menu('mobile-menu')) : ?>
            <?php
            $args = array(
                'theme_location' => 'mobile-menu',
                'container' => 'nav',
                'container_class' => 'mobile-menu',
            );
            wp_nav_menu($args);
            ?>
        <?php endif; ?>
    </div>
    <header class="site-header">
        <div class="navbar container hidden">
            <div class="logo">
                <a href="<?php echo home_url(); ?>"><?php the_custom_logo(); ?></a>
            </div>
            <div class="navigation">
                <?php if (has_nav_menu('main-menu')) : ?>
                    <?php
                    $args = array(
                        'theme_location' => 'main-menu',
                        'container' => 'nav',
                        'container_class' => 'main-menu',
                    );
                    wp_nav_menu($args);
                    ?>
                <?php endif; ?>
            </div>

            <?php get_search_form(true); ?>

            <div class="nav-search">
                <div class="search-icon"><i class="icon-search"></i></div>
                <div class="search-close">x</div>
            </div>
        </div>
        <div class="mobile-menu">
            <div class="mobile-nav container">
                <div class="mobile-left">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>"><?php the_custom_logo(); ?></a>
                    </div>
                </div>
                <div class="mobile-right">
                    <div class="search-icon"><i class="icon-search"></i></div>
                    <div id="nav-icon" class="hamburger-menu toggle-button">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>