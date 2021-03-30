
<div class="payments-list">

    <div class="payments-list__logo">        
        <?php if (has_post_thumbnail()) : ?>
            <?php echo the_post_thumbnail();  ?>
        <?php endif; ?>
    </div>

    <div class = "payments-list__title">               
        <?php the_title(); ?>
    </div>

    <div class="payments-list__desc">
        <?php echo $payment_desc = get_field('payment_desc', false, false); 
            $stripped_desc = str_replace(array('<p>','</p>'),'',$payment_desc);

        ?>              
    </div>

    <div class="payments-list__button">
        <a href="<?php echo get_field('payments_redirect'); ?>" target="_blank"><?php echo __('Read more','betspin'); ?></a>
    </div>

</div>