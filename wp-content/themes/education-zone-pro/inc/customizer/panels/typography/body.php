<?php
/**
 * Body Typography Options
 *
 * @package Benevolent
 */

function education_zone_pro_customize_register_typography_body( ) {

    /** Body Settings */
    Kirki::add_section( 'education_zone_pro_typography_body_section', array(
        'title'      => __( 'Body Settings', 'education-zone-pro' ),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'education_zone_pro_typography_section'
    ) );
    
    /** Body Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_body_font',
    	'label'       => __( 'Body Font', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_typography_body_section',
    	'default'     => array(
    		'font-family' => 'Lato',
    		'variant'     => 'regular',
    	),
    ) );
    
    /** Body Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_body_font_size',
        'label'    => __( 'Body Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_typography_body_section',
        'default'  => '18',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 35,
                        'step' => 1,
                    )
    ) );
    
    /** Body Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_body_line_height',
        'label'    => __( 'Body Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_typography_body_section',
        'default'  => '28',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 15,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );
    
    /** Body Color */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_body_color',
        'label'    => __( 'Body Color', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_typography_body_section',
        'type'     => 'color',
        'default'  => '#5d5d5d',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography_body' );
