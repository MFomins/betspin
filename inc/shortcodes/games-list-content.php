
<div class="games-list">
<a href="<?php echo get_field('games_redirect'); ?>" target="_blank">
<div class="games-list__wrap">
  <div class="games-list__logo">        
    <?php if (has_post_thumbnail()) : ?>
      <?php echo the_post_thumbnail();  ?>
    <?php endif; ?>
    </div>
    <div class="games-list__title">        
      <?php the_title(); ?>
    </div>
</div>
</a>
</div>

