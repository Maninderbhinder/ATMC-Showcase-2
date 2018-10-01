<?php
/**
 * Social Links Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_social_links( ) {
    
    Kirki::add_section( 'education_zone_pro_social_settings', array(
        'title'      => __( 'Social Links Settings', 'education-zone-pro' ),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'education_zone_pro_social_settings'
    ) );
    
    /** Enable/Disable Social in Header */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_ed_social_header',
        'label'       => __( 'Enable Social Links in Header', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_social_settings',
        'default'     => '',
    ) );

    /** Enable/Disable Social in footer */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_ed_social_footer',
        'label'       => __( 'Enable Social Links in Footer', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_social_settings',
        'default'     => '',
    ) );
    
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'repeater',
        'settings'    => 'education_zone_pro_social',
        'label'       => __( 'Add Social Links', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_social_settings',
        'default'     => array(
            array(
                'icon' => 'facebook',
                'link' => 'https://facebook.com',
            ),
            array(
                'icon' => 'twitter',
                'link' => 'https://twitter.com',
            ),
        ),
        'fields'     => array(
            'icon'     => array(
                'type'     => 'select',
                'label'    => __( 'Social Icon', 'education-zone-pro' ),
                'choices'  => education_zone_pro_social_icons(),
                'default'  => 'dribbble'
            ),
            'link'     => array(
                'type'  => 'url',
                'label' => __( 'Link', 'education-zone-pro' ),
                'description'  => __( 'Leave blank if you do not want to show.', 'education-zone-pro' ),
            )
        ),
        'row_label' => array(
            'type' => 'field',
            'value' => __( 'link', 'education-zone-pro' ),
            'field' => 'icon'
        ),
        'sanitize_callback' => 'educaton_zone_pro_sanitize_repeater_setting'               
    ) );

}
add_action( 'init', 'education_zone_pro_customize_register_social_links' );