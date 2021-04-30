<?php
/**
 * Template Name: Sitemap Template
 */
get_header(); 
?>
<div class = "sitemap-body">    
    <div class = "body-row  container">
        <h2 class="sitemap-title" id="pages"><?php _e('Pages', 'betspin'); ?></h2>
        <ul>
            <?php
            // Add pages you'd like to exclude in the exclude here
            wp_list_pages(['exclude' => '', 'title_li' => '', 'depth' => 1])
            ?>
        </ul>
    </div>
    <!-- CPT sitemap -->
    <?php $post_types = get_post_types(['public' => true, '_builtin' => false], 'names', 'and'); ?> 
    <?php foreach ($post_types as $post_type): ?>
            <?php $postsLoop = new WP_Query([
                'post_type' => $post_type,
                'posts_per_page'=>'-1',
                'hide_empty' => true,
                'post_status' => array('publish'),
                'filter' => '1',
            ]);?>
            <?php if($postsLoop->have_posts()) : ?>
              <div class = "body-row container">
                <h2 class="sitemap-title"><?php _e($post_type, 'betspin'); ?></h2>
                <ul>
                <?php while ( $postsLoop->have_posts()): ?>
                    <?php $postsLoop->the_post();?>
                    <li <?php post_class(); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
                <?php endif; ?>
              <?php wp_reset_query(); ?>
            </div> 
    <?php endforeach; ?>
    <div class = "body-row container">
        <h2 class="sitemap-title" id="XML"><?php _e('XML Sitemap', 'betspin'); ?></h2>
        <ul>
            <li>
            <a class="sitemap-xml" href = "<?php echo get_home_url(); ?>/sitemap_index.xml"><?php echo get_home_url(); ?>/sitemap_index.xml</a>
            </li>
        </ul>
    </div>
</div>
<?php get_footer(); ?>