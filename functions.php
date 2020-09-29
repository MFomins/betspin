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

//Create ACF Theme Options page
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}
/*=============================================
=            END ACF			            =
=============================================*/

//Include ACF fields
require_once BETSPIN_TEMPLATE_DIR . '/inc/acf-fields.php';

//Include shortcode
require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/posts-shortcode.php';

require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/block-shortcode.php';

require_once BETSPIN_TEMPLATE_DIR . '/inc/shortcodes/deposit-shortcode.php';


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

//Add stylesheets and JS files
function betspin_scripts()
{
    //Normalize CSS
    wp_enqueue_style('normalize', BETSPIN_DIR_URI . '/dist/css/normalize.css', array(), '8.0.1');

    //Fontello CSS
    wp_enqueue_style('fontello', BETSPIN_DIR_URI . '/dist/css/fontello/fontello-embedded.css', array(), '1.0.0');

    //Main stylesheet
    wp_enqueue_style('betspin-main', get_stylesheet_uri(), array('normalize'), '1.0.35');

    /** Load main JavaScript files */
    wp_enqueue_script('betspin-scripts', BETSPIN_DIR_URI . '/dist/js/scripts.js', array('jquery'), '1.0.0', true);
}

//Create the menus
function betspin_add_menus()
{
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
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
            $item->title = "<img src='{$icon["url"]}' alt='{$icon["alt"]}' class='menu-icon'>" . "<span>" . $item->title . "</span>";
        }
    }
    // return
    return $items;
}

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
