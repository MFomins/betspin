<?php get_header(); ?>
<?php if (is_front_page()) : ?>
    <div class="front-page-head">
        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/chips.png" ?>" alt="chips" class="front-header front-page-chips">
        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/3-woman-dealers.png" ?>" alt="dealers" class="front-header front-page-dealers">
        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/live-screen-2.png" ?>" alt="live-screen" class="front-header live-screen-2">
        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/live-screen-3.png" ?>" alt="screen" class="front-header live-screen-3">
        <div class="head-info-text container">
            <div class="head-info-wrap">
                <div class="text-main"><span>LIVE CASINOS</span></div>
                <div class="text-secondary">Play live games and feel the same <br> exitement as if you sat in real casino</div>
                <div class="homepage-button">
                    <div class="btn-left">
                        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/explore.png" ?>" alt="">
                    </div>
                    <div class="btn-right">
                        <a href="#live-roulette"> <i class="icon-down-open"></i> Get your seat at the table</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<main class="container">
    <div class="page-content">
        <?php if (!is_front_page()) : ?>
            <div class="header-elements">
                <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/live-casinos.png" ?>" alt="Cards">
                <h2><?php echo the_title(); ?></h2>
            </div>
        <?php endif; ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="text-center">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>