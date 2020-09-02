<div class="post-info-wrap">
    <div class="post-thumb">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="post-info">
        <div class="post-title">
            <?php the_title(); ?>
        </div>
        <div class="post-date">
            <?php the_date("d/m/y"); ?>
        </div>
        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="post-tags">
            <?php the_tags(" ", " ", " "); ?>
        </div>
    </div>
</div>