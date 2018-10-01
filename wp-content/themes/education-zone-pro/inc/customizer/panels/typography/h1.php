<?php
/**
 * H1 Typography Options
 *
 * @package Benevolent
 */

function education_zone_pro_customize_register_typography_h1( ) {
    
    /** H1 Typography Settings */
    Kirki::add_section( 'education_zone_pro_h1_section', array(
        'title' => __( 'H1 Settings (Content)', 'education-zone-pro' ),
        'priority' => 23,
        'capability' => 'edit_theme_options',
        'panel'     => 'education_zone_pro_typography_section'
    ) );
    
    /** H1 Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_h1_font',
    	'label'       => __( 'H1 Font', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_h1_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );
    
    /** H1 Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h1_font_size',
        'label'    => __( 'H1 Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h1_section',
        'default'  => '38',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 25,
                        'max'  => 70,
                        'step' => 1,
                    )
    ) );
    
    /** H1 Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h1_line_height',
        'label'    => __( 'H1 Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h1_section',
        'default'  => '42',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 30,
                        'max'  => 80,
                        'step' => 1,
                    )
    ) );
    
    /** H1 Color */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h1_color',
        'label'    => __( 'H1 Color', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h1_section',
        'type'     => 'color',
        'default'  => '#474b4e',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography_h1' );