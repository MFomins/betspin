<?php get_header(); ?>
<?php if (is_front_page()) : ?>
    <div class="front-page-head">
        <div class="head-info-text container">
            <div class="head-info-wrap">
                <div class="text-main"><span>LIVE CASINOS</span></div>
                <div class="text-secondary">Get closer to the action with live casino games</div>
                <div class="homepage-button">
                    <div class="btn-left">
                        <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/explore.png" ?>" alt="explore icon">
                    </div>
                    <div class="btn-right">
                        <a href="#live-roulette"> <i class="icon-down-open"></i> Take your seat</a>
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
                <img src="<?php echo BETSPIN_DIR_URI . "/dist/img/live-casinos.png" ?>" alt="cards">
                <h1><?php echo the_title(); ?></h1>
            </div>
            <div class="breadcrumbs">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
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