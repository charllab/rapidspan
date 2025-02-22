<?php
/* Require Includes */
include_once get_template_directory() . '/includes/helper-functions.php';
include_once get_template_directory() . '/includes/bootstrap-5-wp-navwalker.php';

/* Hooks */
if (!function_exists('enqueue_scripts')) {

    add_action('wp_enqueue_scripts', 'enqueue_scripts');

    // Cache bust constants
    define('THEMESTYLE_VERSION', filemtime(get_stylesheet_directory().'/style/style.css'));
    define('HEADERBUNDLE_VERSION', filemtime(get_stylesheet_directory().'/js/header-bundle.js'));
    define('FOOTERBUNDLE_VERSION', filemtime(get_stylesheet_directory().'/js/footer-bundle.js'));

    function enqueue_scripts()
    {
        // Register our own jquery
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');

        wp_enqueue_style('style_file', get_stylesheet_directory_uri().'/style/style.css', [], THEMESTYLE_VERSION);
        wp_enqueue_script('header_js', get_stylesheet_directory_uri().'/js/header-bundle.js', null, HEADERBUNDLE_VERSION, false);
        wp_enqueue_script('footer_js', get_stylesheet_directory_uri().'/js/footer-bundle.js', null, FOOTERBUNDLE_VERSION, true);
    }
}

if (!function_exists('custom_after_setup_theme')) {

    add_action('after_setup_theme', 'custom_after_setup_theme', 11);

    function custom_after_setup_theme()
    {
        remove_theme_support('custom-background');
        //remove_theme_support('post-thumbnails');
        add_theme_support( 'post-thumbnails' );

        register_nav_menus([
            'primary' => 'Primary Menu',
            'secondary' => 'Footer Menu',
            'tertiary' => 'Legal Menu'
        ]);

        // Style Gutenberg
        add_theme_support('editor-styles');
        add_editor_style('style-editor.css');
    }
}

/* Misc */
remove_action('wp_head', 'wp_generator');
add_filter('allow_dev_auto_core_updates', '__return_false');
add_filter('auto_update_plugin', '__return_true');

/* Gravity Forms */
add_filter('gform_init_scripts_footer', '__return_true');
add_filter('gform_confirmation_anchor', '__return_false');
//add_filter('gform_enable_field_label_visibility_settings', '__return_true');

/* ACF - Theme Options */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'position' => 80,
        'redirect' => false
    ]);
}

//related post function
function get_related_posts($post_id, $post_type = 'post', $taxonomy = 'category', $number_of_posts = 4) {
    $related_posts = [];

    $terms = wp_get_post_terms($post_id, $taxonomy);

    if ($terms && !is_wp_error($terms)) {
        $term_ids = wp_list_pluck($terms, 'term_id');

        $args = [
            'post_type' => $post_type,
            'posts_per_page' => $number_of_posts,
            'post__not_in' => [$post_id],
            'tax_query' => [
                [
                    'taxonomy' => $taxonomy,
                    'field' => 'id',
                    'terms' => $term_ids,
                ],
            ],
        ];

        $related_posts_query = new WP_Query($args);

        if ($related_posts_query->have_posts()) {
            $related_posts = $related_posts_query->posts;
        }
    }

    if (empty($related_posts)) {
        $args = [
            'post_type' => $post_type,
            'posts_per_page' => $number_of_posts,
            'post__not_in' => [$post_id],
            'orderby' => 'date',
            'order' => 'DESC',
        ];

        $latest_posts_query = new WP_Query($args);

        if ($latest_posts_query->have_posts()) {
            $related_posts = $latest_posts_query->posts;
        }
    }

    return $related_posts;
}