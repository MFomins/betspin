<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="slideout-menu">
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
            <div class="nav-search">
                <?php get_search_form(true); ?>
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