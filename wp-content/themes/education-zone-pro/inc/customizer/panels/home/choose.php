<?php
/**
 * Home Page why_choose Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_why_choose( ) {
    
    
    /** why_choose Section */
    Kirki::add_section( 'education_zone_pro_why_choose_settings', array(
        'title' => __( 'Why Choose Us Section', 'education-zone-pro' ),
        'priority' => 60,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    /** why_choose Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_why_choose_title',
        'label'       => __( 'Why Choose Us Section Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
    ) );

    /** why_choose Section Content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_why_choose_content',
        'label'       => __( 'Section Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
    ) );     
    
    /** why_choose Post One */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_one',
        'label'       => __( 'Select Post/Page One', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
    
    /** why_choose Post Two */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_two',
        'label'       => __( 'Select Post/Page Two', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
    
    /** why_choose Post Three */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_three',
        'label'       => __( 'Select Post/Page Three', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
    
    /** why_choose Post Four */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_four',
        'label'       => __( 'Select Post/Page Four', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
    /** why_choose Section Ends */
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_why_choose' );