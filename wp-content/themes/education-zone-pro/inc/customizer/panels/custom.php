<?php
/**
 * Custom Options
 *
 * @package Education_Zone_Pro
 */

function education_zone_pro_customize_register_custom( ) {

    Kirki::add_panel( 'education_zone_pro_custom_code_panel', array(
        'title'      => __( 'Custom Codes', 'education-zone-pro' ),
        'priority'   => 121,
        'capability' => 'edit_theme_options',
    ) );
        
    Kirki::add_section( 'education_zone_pro_custom_settings', array(
        'title'      => __( 'Custom Script', 'education-zone-pro' ),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'education_zone_pro_custom_code_panel',
    ) );
    
    /** Custom Script */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'code',
        'settings' => 'education_zone_pro_custom_script',
        'label'    => __( 'Custom Script', 'education-zone-pro' ),
        'tooltip'  => __( 'Put the script like anlytics or any other here.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_custom_settings',
        'choices'  => array(
            'language' => 'javascript',
            'theme'    => 'monokai',
        ),
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_custom' );