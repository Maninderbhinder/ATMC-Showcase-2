<?php
/**
 * Header Miscellaneous Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_header_misc( ) {
    
    Kirki::add_section( 'education_zone_pro_header_misc_setting', array(
        'title'      => __( 'Misc Settings', 'education-zone-pro' ),
        'priority'   => 40,
        'panel' => 'education_zone_pro_header_setting',
    ) );
    
    /** Enable/Disable Sticky Header */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_ed_sticky_header',
        'label'       => __( 'Enable Sticky Header', 'education-zone-pro' ),
        'tooltip'     => __( 'Enable to make header sticky.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_header_misc_setting',
        'default'     => '',
    ) );
    
    /** Enable/Disable Search Form */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_ed_search_form',
        'label'       => __( 'Enable Search Form', 'education-zone-pro' ),
        'tooltip'     => __( 'Enable to show search form in header.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_header_misc_setting',
        'default'     => '1',
    ) );

    /** Email */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_email',
        'label'       => __( 'Email', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_header_misc_setting',
        'default'     => '',
        'sanitize_callback' => 'sanitize_email'
    ) );
    
     /** Phone Number */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_phone_number',
        'label'       => __( 'Phone Number', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_header_misc_setting',
        'default'     => '',
        'sanitize_callback'=> 'sanitize_text_field',
    ) );

    /** Address */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_address',
        'label'       => __( 'Address', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_header_misc_setting',
        'default'     => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    /** CTA Label */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_cta_label',
        'label'       => __( 'CTA Label', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_header_misc_setting',
        'default'           => __( 'Apply Now', 'education-zone-pro' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );   

    /** CTA  Link */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_cta_link',
        'label'       => __( 'CTA Link', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_header_misc_setting',
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) ); 
    
}
add_action( 'init', 'education_zone_pro_customize_register_header_misc' );