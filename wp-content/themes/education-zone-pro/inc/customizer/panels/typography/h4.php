<?php
/**
 * H4 Typography Options
 *
 * @package Benevolent
 */

function education_zone_pro_customize_register_typography_h4( ) {
    
    /** H4 Typography Settings */
    Kirki::add_section( 'education_zone_pro_h4_section', array(
        'title' => __( 'H4 Settings (Content)', 'education-zone-pro' ),
        'priority' => 26,
        'capability' => 'edit_theme_options',
        'panel'     => 'education_zone_pro_typography_section'
    ) );
    
    /** H4 Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_h4_font',
    	'label'       => __( 'H4 Font', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_h4_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );
    
    /** H4 Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h4_font_size',
        'label'    => __( 'H4 Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h4_section',
        'default'  => '21',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 30,
                        'step' => 1,
                    )
    ) );
    
    /** H4 Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h4_line_height',
        'label'    => __( 'H4 Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h4_section',
        'default'  => '25',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 15,
                        'max'  => 40,
                        'step' => 1,
                    )
    ) );
    
    /** H4 Color */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h4_color',
        'label'    => __( 'H4 Color', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h4_section',
        'type'     => 'color',
        'default'  => '#393939',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography_h4' );