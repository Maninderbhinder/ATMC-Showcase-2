<?php
/**
 * H3 Typography Options
 *
 * @package Benevolent
 */

function education_zone_pro_customize_register_typography_h3( ) {
    
    /** H3 Typography Settings */
    Kirki::add_section( 'education_zone_pro_h3_section', array(
        'title' => __( 'H3 Settings (Content)', 'education-zone-pro' ),
        'priority' => 25,
        'capability' => 'edit_theme_options',
        'panel'     => 'education_zone_pro_typography_section'
    ) );
    
    /** H3 Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_h3_font',
    	'label'       => __( 'H3 Font', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_h3_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );
    
    /** H3 Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h3_font_size',
        'label'    => __( 'H3 Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h3_section',
        'default'  => '23',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 15,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );
    
    /** H3 Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h3_line_height',
        'label'    => __( 'H3 Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h3_section',
        'default'  => '28',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 60,
                        'step' => 1,
                    )
    ) );
    
    /** H3 Color */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h3_color',
        'label'    => __( 'H3 Color', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h3_section',
        'type'     => 'color',
        'default'  => '#393939',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography_h3' );