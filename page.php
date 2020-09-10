<?php get_header(); ?>
<?php if (is_front_page()) : ?>
    <div class="front-page-head">
        <div class="head-info-text container">
            <div class="head-info-wrap">
                <div class="text-main">EXPLORE THE WORLD OF <span>LIVE CASINOS</span></div>
                <div class="text-secondary">BLACKJACK ● ROULETTE ● BACCARAT ● CARRIBEAN STUD </br> THREE CARD POKER ● HOLD'EM ● PREMIUM ROULETTE</div>
                <div class="homepage-button">
                    <div class="btn-left">
                        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/explore.png" ?>" alt="">
                    </div>
                    <div class="btn-right">
                        <a href="#live-roulette"> <i class="icon-down-open"></i> START EXPLORING</a>
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