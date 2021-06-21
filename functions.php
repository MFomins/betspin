<?php
// Define path and URL to the ACF plugin.

define('BETSPIN_TEMPLATE_DIR', get_template_directory());
define('BETSPIN_DIR_URI', get_template_directory_uri());

/*=============================================
=            ACF			            =
=============================================*/
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path($path)
{
    $path = BETSPIN_TEMPLATE_DIR . '/vendor/acf/';
    return $path;
}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir($dir)
{
    $dir = BETSPIN_DIR_URI . '/vendor/acf/';
    return $dir;
}

// 3. Include ACF
include_once(BETSPIN_TEMPLATE_DIR . '/vendor/acf/acf.php');

// Show menu ACF
add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin($show)
{
    return true;
}

/*=============================================
=            END ACF			            =
=============================================*/

//Include ACF fields
require_once BETSPIN_TEMPLATE_DIR . '/inc/acf-fields.php';

//Include shortcode
require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/posts-shortcode.php';

require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/related-posts-shortcode.php';

require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/block-shortcode.php';

require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/deposit-shortcode.php';

require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/payments-list-shortcode.php';

require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/games-list-shortcode.php';

/*=============================================
=            FUNCTIONS			            =
=============================================*/

//Enable featured images
function betspin_setup()
{
    //Add featured image
    add_theme_support('post-thumbnails');
    //Add custom logo
    add_theme_support('custom-logo');

    //Load text domain for translations
    load_theme_textdomain('betspin', BETSPIN_TEMPLATE_DIR . '/languages');
    //Add title tag
    add_theme_support('title-tag');
}

//Unregister widgets
function betspin_unregister_widgets()
{
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_Media_Video');
    unregister_widget('WP_Widget_Media_Image');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Media_Gallery');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Calendar');
}

//General settings
function general_set_sitemap()
{
    //define the settings field
    add_settings_field(
        'sitemap_page_id',                      //The ID
        'Please set sitemap',                   // the label for field
        'sitemap_pages_dropdown',               //The callback function
        'general'                               //the page
    );

    //register the footer_message setting the general section
    register_setting(
        'general',
        'sitemap_page_id'
    );
}

add_action('admin_init', 'general_set_sitemap');

function sitemap_pages_dropdown()
{
    $selected_sitemap_id = get_option('sitemap_page_id');

    wp_dropdown_pages(array(
        'show_option_none' => 'none',
        'name' => 'sitemap_page_id',
        'id' => 'sitemap_page_id',
        'selected' => $selected_sitemap_id,
    ));
}

//Delete transients
add_action('wp_insert_post', 'delete_transient_on_save', 5, 3);
add_action('save_post', 'delete_transient_on_save', 5, 3);
add_action('edit_post', 'delete_cpt_transient_on_edit_delete', 5, 2);
add_action('delete_post', 'delete_cpt_transient_on_edit_delete', 5, 2);

function delete_transient_on_save($post_id, $post, $update)
{
    delete_cpt_transients($post_id, $post);
}

function delete_cpt_transient_on_edit_delete($post_id, $post)
{
    delete_cpt_transients($post_id, $post);
}

function delete_cpt_transients($post_id, $post)
{
    $selected_sitemap_id = get_option('sitemap_page_id');
    if (function_exists('rocket_clean_post')) {
        rocket_clean_post((int)$selected_sitemap_id);
    }
    delete_transient('sitemap_' . $post->post_type);
}

//Add stylesheets and JS files
function betspin_scripts()
{
    //Main stylesheet
    wp_enqueue_style('betspin-main', get_stylesheet_uri(), array(), '1.0.66');

    //Google font
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

    //Min Main Css
    // wp_enqueue_style('betspin-main', BETSPIN_DIR_URI . '/dist/css/style.min.css', array(), '1.0.5');

    /** Load main JavaScript files */
    wp_enqueue_script('betspin-scripts', BETSPIN_DIR_URI . '/dist/js/scripts.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('toplist', BETSPIN_DIR_URI . '/assets/dist/front.js', array(), '1.0.21', true);
}

//Create the menus
function betspin_add_menus()
{
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
        'mobile-menu' => 'Mobile Menu',
        'footer-1' => 'Footer Menu 1',
        'footer-2' => 'Footer Menu 2',
        'footer-3' => 'Footer Menu 3',
        'footer-4' => 'Footer Menu 4',
    ));
}

//Creates the Widgets
function betspin_add_widgets()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

//Adds images in front of menu items
function betspin_nav_menu_objects($items, $args)
{
    // loop
    foreach ($items as &$item) {
        // vars
        $icon = get_field('betspin_menu_icon', $item);
        // append icon
        if ($icon) {
            $item->title = "<img src='{$icon["url"]}' alt='{$icon["alt"]}' class='menu-icon'>" . "<span itemprop='name'>" . $item->title . "</span>";
        } else {
            $item->title = "<span itemprop='name'>" . $item->title . "</span>";
        }
    }
    // return
    return $items;
}

//Arrow after menu items with children
function betspin_menu_arrow($item_output, $item, $depth, $args)
{
    if (in_array('menu-item-has-children', $item->classes)) {
        $arrow = '<i class="icon-down-open"></i>'; // Change the class to your font icon
        $item_output = str_replace('</a>', '</a>' . $arrow . '', $item_output);
    }
    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'betspin_menu_arrow', 10, 4);

//Give different classes for different submenus
function custom_submenu_css_class($classes, $args, $depth)
{
    if (0 == $depth) {
        $classes[] = 'sub-menu-1 hide-menu';
    }
    if (1 == $depth) {
        $classes[] = 'sub-menu-2 hide-menu';
    }
    // ...
    return $classes;
}

add_filter('nav_menu_submenu_css_class', 'custom_submenu_css_class', 10, 3);

//Custom excerpt lenght
function betspin_custom_excerpt_length($length)
{
    return 12;
}

//Remove braces after excerpt
function betspin_excerpt_more($more)
{
    return '';
}

add_filter('excerpt_more', 'betspin_excerpt_more');

/*=============================================
=            FILTERS			            =
=============================================*/

//Change excerpt lenght
add_filter('excerpt_length', 'betspin_custom_excerpt_length', 10);

//Add icons to menu items
add_filter('wp_nav_menu_objects', 'betspin_nav_menu_objects', 10, 2);

// Allow HTML in author bio section 
remove_filter('pre_user_description', 'wp_filter_kses');

$payment_desc = get_field('payment_desc');
function the_field_without_wpautop($payment_desc)
{

    remove_filter('acf_the_content', 'wpautop');

    the_field($payment_desc);

    add_filter('acf_the_content', 'wpautop');

}

/*=============================================
=            ACTIONS			            =
=============================================*/

//Creates the Widgets
add_action('widgets_init', 'betspin_add_widgets');

//Adds stylesheets and scripts
add_action('wp_enqueue_scripts', 'betspin_scripts');

//Hook menus into wordpress
add_action('init', 'betspin_add_menus');

//Add settings when the theme is activated
add_action('after_setup_theme', 'betspin_setup');

//Unregister widgets
add_action('widgets_init', 'betspin_unregister_widgets');


function site_popup()
{
    $popup = '';
    $popup .= '<div class="popup">';
    $popup .= '<span class="popup-close">&#215;</span>';
    $popup .= '<span class="popup-title">Thank you for subscribing!</span>';
    $popup .= '<span>You are now part of <strong>Betspin</strong> extraordinary group of friends! Our best offers are on the way to your email.</span>';
    $popup .= '<img class="popup-logo" src="' . BETSPIN_DIR_URI . "/dist/img/betspin-logo-popup.png" . '" alt="Betspin logo">';
    $popup .= '</div>';

    echo $popup;
}

function betspin_socials()
{
    ?>
    <div class="footer-socials">
        <a href="https://www.facebook.com/betspinofficial" target="_blank" rel="noopener"><img
                    src="<?php echo BETSPIN_DIR_URI . '/dist/img/socials-facebook.png'; ?>" alt="facebook"></a>
        <a href="https://www.youtube.com/channel/UC3Q1xwrFgEYbmo3ZQOXGpsw" target="_blank" rel="noopener"><img
                    src="<?php echo BETSPIN_DIR_URI . '/dist/img/socials-youtube.png'; ?>" alt="youtube"></a>
        <a href="https://twitter.com/betspinofficial" target="_blank" rel="noopener"><img
                    src="<?php echo BETSPIN_DIR_URI . '/dist/img/socials-twitter.png'; ?>" alt="twitter"></a>
        <a href="https://www.instagram.com/betspin_official/" target="_blank" rel="noopener"><img
                    src="<?php echo BETSPIN_DIR_URI . '/dist/img/socials-instagram.png'; ?>" alt="instagram"></a>
    </div>
    <?php
}


function betspin_generate_toc()
{
    $toc = "";
    $toc .= '<div id="toc">';
    $toc .= '<p>Contents</p>';
    $toc .= '<ul data-toc data-toc-headings="h2"></ul>';
    $toc .= '</div>';

    return $toc;
}

add_shortcode('betspin_toc', 'betspin_generate_toc');

// add payment methods CPT
function payment_methods()
{

    $args = array(
        'labels' => array(
            'name' => 'Payment methods',
            'singular_name' => 'payment_method',
        ),
        'show_ui' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-money',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'payment_methods'),
    );

    register_post_type('payment_methods', $args);

}

add_action('init', 'payment_methods');

// add payment methods CPT
function games_buttons()
{

    $args = array(
        'labels' => array(
            'name' => 'Games buttons',
            'singular_name' => 'game_buttons',
        ),
        'show_ui' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-games',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'games_buttons'),
    );

    register_post_type('games_buttons', $args);

}

add_action('init', 'games_buttons');

/**
 * Allow changing of the canonical URL.
 *
 * @param string $canonical The canonical URL.
 */
add_filter('rank_math/frontend/canonical', function ($canonical) {
    //target a page using its page id
    if (is_post_type_archive('casino-review') || is_single([429, 428, 427, 426, 425, 421])) {
        return false;
    }
    return $canonical;
});

// Remove ACF from menu items
// add_filter('acf/settings/show_admin', '__return_false');


//Add site navigation element to site menu
function wpse183311_filter($atts, $item, $args)
{
    $atts['itemprop'] = 'url';
    return $atts;
}

add_filter('nav_menu_link_attributes', 'wpse183311_filter', 3, 10);

// Add blog CPT
function blog_register_cpt()
{

    $args = array(
        'labels' => array(
            'name' => 'Blog',
        ),
        'public' => true,
        'show_ui' => true,
        'has_archive' => false,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-welcome-add-page',
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('blog', $args);

}

add_action('init', 'blog_register_cpt');

// Add blog CPT
function news_register_cpt()
{

    $args = array(
        'labels' => array(
            'name' => 'News',
        ),
        'public' => true,
        'show_ui' => true,
        'has_archive' => false,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-welcome-add-page',
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('news', $args);

}

add_action('init', 'news_register_cpt');

