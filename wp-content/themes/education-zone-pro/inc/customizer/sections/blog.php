<?php
/**
 * Blog/Archive Options
 *
 * @package Education Zone Pro
 */

function education_zone_pro_customize_register_blog( ) {

    /* Option list of all categories */
    $args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $option_categories = array();
    $category_lists = get_categories( $args );
    foreach( $category_lists as $category ){
        $option_categories[$category->term_id] = $category->name;
    }
    
    Kirki::add_section( 'education_zone_pro_blog_page_settings', array(
        'priority'   => 27,
        'capability' => 'edit_theme_options',
        'title'      => __( 'Blog Page Settings', 'education-zone-pro' ),
    ) );
    
    Kirki::add_field( 'education_zone_pro', array(
        'settings' => 'education_zone_pro_blog_layout',
        'label'    => __( 'Blog Page Layout', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_blog_page_settings',
        'type'     => 'radio',
        'default'  => 'default',
        'choices'  => array(
            'default' => __( 'Default', 'education-zone-pro' ),
            'square'  => __( 'Square Image', 'education-zone-pro' ),
            'round'   => __( 'Round Image', 'education-zone-pro' ),
        )
    ) );
    
    Kirki::add_field( 'education_zone_pro', array(
        'settings'    => 'education_zone_pro_exclude_categories',
        'label'       => __( 'Exclude Categories', 'education-zone-pro' ),
        'description' => __( 'Check multiple categories to exclude from blog and archive page.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_blog_page_settings',
        'type'        => 'multicheck',
        'choices'     => $option_categories
    ) ); 
    
}
add_action( 'init', 'education_zone_pro_customize_register_blog' );