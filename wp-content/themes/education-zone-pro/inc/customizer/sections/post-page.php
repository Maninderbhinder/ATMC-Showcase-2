<?php
/**
 * Post Page Options
 *
 * @package Education Zone Pro
 */

function education_zone_pro_customize_register_postpage( ) {

    Kirki::add_section( 'education_zone_pro_post_page_settings', array(
        'priority'   => 28,
        'capability' => 'edit_theme_options',
        'title'      => __( 'Post Page Settings', 'education-zone-pro' ),
    ) );
    
    /** Featured Image */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Show Featured Image', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_post_page_settings',
        'description'=> __( 'Disable to hide featured image in single post and Single Page', 'education-zone-pro' ),
        'settings'  => 'education_zone_pro_ed_featured_image',
        'type'      => 'toggle',
        'default'   => '1',
    ) );

        /** Author Bio */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Show Author Bio', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_post_page_settings',
        'settings'  => 'education_zone_pro_ed_author_bio',
        'type'      => 'toggle',
        'default'   => '1',
    ) );
    
    /** Comments */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Show Comments', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_post_page_settings',
        'settings'  => 'education_zone_pro_ed_comments',
        'type'      => 'toggle',
        'default'   => '1',
    ) );
    
    /** Highlight Author Comment */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Highlight Author Comment', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_post_page_settings',
        'settings'  => 'education_zone_pro_ed_auth_comments',
        'type'      => 'toggle',
        'default'   => '',
    ) ); 
}
add_action( 'init', 'education_zone_pro_customize_register_postpage' );