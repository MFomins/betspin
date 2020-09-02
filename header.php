<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="navbar container">
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
            <div class="nav-login">
                <div class="search-icon"><i class="icon-search"></i></div>
                <div class="login-btn">
                    <span>Login</span>
                </div>
            </div>
        </div>
    </header>