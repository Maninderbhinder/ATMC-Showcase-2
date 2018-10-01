<?php
/**
 * Home Page CTA Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_CTA( ) {
    
    //global $education_zone_pro_options_posts;
    
    /** CTA Section */
    Kirki::add_section( 'education_zone_pro_CTA_settings', array(
        'title' => __( 'CTA Section', 'education-zone-pro' ),
        'priority' => 50,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    /** CTA Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_CTA_section_title',
        'label'       => __( 'CTA Section Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_CTA_settings',
        'default'     => '',
    ) );    
    
    /** CTA Content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_CTA_content',
        'label'       => __( 'Section Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_CTA_settings',
        'default'     => '',
    ) );
    
    /** Button Text one */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_CTA_button_text_one',
        'label'       => __( 'First Button Text', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_CTA_settings',
        'default'     => '',
       
    ) );
    
    /** CTA Button Link one */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_CTA_button_link_one',
        'label'       => __( 'First Button Link', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_CTA_settings',
        'default'     => '',

    ) );
    
    /** Button Text two */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_CTA_button_text_two',
        'label'       => __( 'Second Button Text', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_CTA_settings',
        'default'     => '',
       
    ) );
    
    /** CTA Button Link two */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_CTA_button_link_two',
        'label'       => __( 'Second Button Link', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_CTA_settings',
        'default'     => '',

    ) );

    /** Background Image */
    Kirki::add_field( 'education_zone_pro', array(
    'type'        => 'image',
    'settings'    => 'education_zone_pro_background_cta_image',
    'label'       => __( 'Background Image', 'education-zone-pro' ),
    'section'     => 'education_zone_pro_CTA_settings',
    'default'     => ''

     ) );
    
    /** CTA Section Ends */
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_CTA' );