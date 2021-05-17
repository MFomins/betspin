<?php
/**
 * Template Name: Sitemap Template
 */
get_header(); 
?>
<div class = "sitemap-body">    
<h1 class="sitemap-h1"><?php the_title(); ?></h1>
    <div class = "body-row  container">
        <h2 class="sitemap-title" id="pages"><?php _e('Pages', 'betspin'); ?></h2>
        <ul>
            <?php
            // Add pages you'd like to exclude in the exclude here
            wp_list_pages(['exclude' => '', 'title_li' => '',])
            ?>
        </ul>
    </div>
<!-- CPT sitemap -->
    <?php $post_types = get_post_types(['public' => true, '_builtin' => false], 'names', 'and'); ?> 
    <?php foreach ($post_types as $post_type): ?>
        <?php $post_name = get_post_type_object($post_type); ?>
            <?php if(false === ($postsLoop = get_transient('sitemap_'.$post_type))) {
                $postsLoop = new WP_Query([
                    'post_type' => $post_type,
                    'posts_per_page'=> -1,
                    'hide_empty' => true,
                    'post_status' => array('publish'),
                    ]);
                set_transient('sitemap_'.$post_type, $postsLoop, 30 * DAY_IN_SECONDS);
                }
            ?>
            <?php if($postsLoop->have_posts()) : ?>
              <div class = "body-row container">
                <h2 class="sitemap-title"><?php _e($post_name->labels->name, 'betspin'); ?></h2>
                <ul>
                <?php while ( $postsLoop->have_posts()): ?>
                    <?php $postsLoop->the_post();?>
                    <li <?php post_class(); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </ul>
            </div> 
    <?php endforeach; ?>
<!-- XML Sitemap -->
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