<?php
/**
 * Performance Settings
 *
 * @package Education_Zone_Pro
 */

function education_zone_pro_customize_register_general_performance() {
     

    /** Performance Settings */
    Kirki::add_section( 'education_zone_pro_performance_settings', array(
        'title' => __( 'Performance Settings', 'education-zone-pro' ),
        'priority' => 70,
        'capability' => 'edit_theme_options',
    ) );
    
    /** Lazy Load */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Lazy Load', 'education-zone-pro' ),
        'description'   => __( 'Enable lazy loading of featured images.', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_performance_settings',
        'settings'  => 'ed_lazy_load',
        'type'      => 'toggle',
        'default'   => '0',
    ) );

    /** Lazy Load Content Images */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Lazy Load Content Images', 'education-zone-pro' ),
        'description'   => __( 'Enable lazy loading of images inside page/post content.', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_performance_settings',
        'settings'  => 'ed_lazy_load_cimage',
        'type'      => 'toggle',
        'default'   => '0',
    ) );

    /** Defer JavaScript */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Defer JavaScript', 'education-zone-pro' ),
        'description'   => __( 'Adds "defer" attribute to sript tags to improve page download speed.', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_performance_settings',
        'settings'  => 'ed_defer',
        'type'      => 'toggle',
        'default'   => '0',
    ) );

    /** Remove ver parameters */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Remove ver parameters', 'education-zone-pro' ),
        'description'   => __( 'Enable to remove "ver" parameter from CSS and JS file calls.', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_performance_settings',
        'settings'  => 'ed_ver',
        'type'      => 'toggle',
        'default'   => '0',
    ) );  
}
add_action( 'init', 'education_zone_pro_customize_register_general_performance' );