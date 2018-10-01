<?php
/**
 * WordPress Hooks
 *
 * @package education_zone_pro
 */

if( get_theme_mod( 'education_zone_pro_ed_adminbar' ) ) add_filter( 'show_admin_bar', '__return_false' );

/**
 * @see education_zone_pro_setup
*/
add_action( 'after_setup_theme', 'education_zone_pro_setup' );

/**
 * @see education_zone_pro_content_width
*/
add_action( 'after_setup_theme', 'education_zone_pro_content_width', 0 );

/**
 * @see education_zone_pro_theme_updater
*/
add_action( 'after_setup_theme', 'education_zone_pro_theme_updater' );


/**
 * @see education_zone_pro_scripts
*/
add_action( 'wp_enqueue_scripts', 'education_zone_pro_scripts' );

/**
 * Enqueue Google Fonts 
 * @see education_zone_pro_scripts_styles
*/
add_action( 'wp_enqueue_scripts', 'education_zone_pro_scripts_styles' );

/**
 * Enqueue Admin Scripts
 * 
 * @see education_zone_pro_admin_scripts
*/
add_action( 'admin_enqueue_scripts', 'education_zone_pro_admin_scripts' );

/**
 * Enqueue Customizer Control Script for displaying widget in respective panels
 * @see education_zone_pro_customizer_style_and_script
*/
add_action( 'customize_controls_enqueue_scripts', 'education_zone_pro_customizer_style_and_script' );

/**
 * @see education_zone_pro_body_classes
*/
add_filter( 'body_class', 'education_zone_pro_body_classes' );

/**
 * Add Post Class
 * @see education_zone_pro_post_classes
*/
add_filter( 'post_class', 'education_zone_pro_post_classes' );


/**
 * @see education_zone_pro_category_transient_flusher
*/
add_action( 'edit_category', 'education_zone_pro_category_transient_flusher' );
add_action( 'save_post',     'education_zone_pro_category_transient_flusher' );

/**
 * @see education_zone_pro_change_comment_form_default_fields
 * @see education_zone_pro_change_comment_form_defaults
*/
add_filter( 'comment_form_default_fields', 'education_zone_pro_change_comment_form_default_fields' );
add_filter( 'comment_form_defaults', 'education_zone_pro_change_comment_form_defaults' );

/**
 * Dynamic CSS
 * @see education_zone_pro_dynamic_css
*/
add_action( 'wp_head', 'education_zone_pro_dynamic_css', 100 );

/**
 * @see education_zone_pro_excerpt_more
 * @see education_zone_pro_excerpt_length
*/
add_filter( 'excerpt_more', 'education_zone_pro_excerpt_more' );
add_filter( 'excerpt_length', 'education_zone_pro_excerpt_length', 999 );

/**
 * Custom JS
 * @see education_zone_pro_custom_js
*/
add_action( 'wp_footer', 'education_zone_pro_custom_js' );

/**
 * Ajax Search
 * @see education_zone_pro_ajax_search
*/
if( get_theme_mod( 'education_zone_pro_ed_ajax_search' ) ) {
    add_action( 'wp_ajax_education_zone_pro_search', 'education_zone_pro_ajax_search' );
    add_action( 'wp_ajax_nopriv_education_zone_pro_search', 'education_zone_pro_ajax_search' );
}

/**
 * Excluding post from blog of specific categories
 * 
 * @see education_zone_pro_exclude_cat
 * @see education_zone_pro_custom_category_widget
 * @see education_zone_pro_exclude_posts_from_recentPostWidget_by_cat
 */
add_filter( 'pre_get_posts', 'education_zone_pro_exclude_cat' );

add_filter( "widget_categories_args", "education_zone_pro_custom_category_widget" );

add_filter( "widget_categories_dropdown_args", "education_zone_pro_custom_category_widget" );

add_filter( "widget_posts_args", "education_zone_pro_exclude_posts_from_recentPostWidget_by_cat" );

/**
 * Add OG Tags in header
*/
add_action( 'wp_head', 'education_zone_pro_og_header' );