<?php
/**
 * BreadCrumb Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_breadcrumb( ) {

    Kirki::add_section( 'education_zone_pro_breadcrumb_settings', array(
        'priority'   => 31,
        'capability' => 'edit_theme_options',
        'title'      => __( 'BreadCrumb Settings', 'education-zone-pro' ),
    ) );
    
    /** Enable/Disable BreadCrumb */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Enable Breadcrumb', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_breadcrumb_settings',
        'settings'  => 'education_zone_pro_ed_breadcrumb',
        'type'      => 'toggle',
        'default'   => '',
    ) );
    
    /** Home Text */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Breadcrumb Home Text', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_breadcrumb_settings',
        'settings'  => 'education_zone_pro_breadcrumb_home_text',
        'type'      => 'text',
        'default'   => __( 'Home', 'education-zone-pro' ),
    ) );
    
    /** Breadcrumb Separator */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Breadcrumb Separator', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_breadcrumb_settings',
        'settings'  => 'education_zone_pro_breadcrumb_separator',
        'type'      => 'text',
        'default'   => __( '>', 'education-zone-pro' ),
        'sanitize_callback' => 'wp_kses_post',
    ) );

}
add_action( 'init', 'education_zone_pro_customize_register_breadcrumb' );