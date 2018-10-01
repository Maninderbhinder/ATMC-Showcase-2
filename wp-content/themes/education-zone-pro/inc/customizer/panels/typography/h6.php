<?php
/**
 * H6 Typography Options
 *
 * @package Benevolent
 */

function education_zone_pro_customize_register_typography_h6( ) {
    
    /** H6 Typography Settings */
    Kirki::add_section( 'education_zone_pro_h6_section', array(
        'title' => __( 'H6 Settings (Content)', 'education-zone-pro' ),
        'priority' => 28,
        'capability' => 'edit_theme_options',
        'panel'     => 'education_zone_pro_typography_section'
    ) );
    
    /** H6 Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_h6_font',
    	'label'       => __( 'H6 Font', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_h6_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );
    
    /** H6 Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h6_font_size',
        'label'    => __( 'H6 Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h6_section',
        'default'  => '17',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 30,
                        'step' => 1,
                    )
    ) );
    
    /** H6 Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h6_line_height',
        'label'    => __( 'H6 Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h6_section',
        'default'  => '21',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 35,
                        'step' => 1,
                    )
    ) );
    
    /** H6 Color */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h6_color',
        'label'    => __( 'H6 Color', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h6_section',
        'type'     => 'color',
        'default'  => '#393939',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography_h6' );