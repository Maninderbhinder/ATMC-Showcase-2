<?php
/**
 * H2 Typography Options
 *
 * @package Benevolent
 */

function education_zone_pro_customize_register_typography_h2( ) {
    
     /** H2 Typography Settings */
    Kirki::add_section( 'education_zone_pro_h2_section', array(
        'title' => __( 'H2 Settings (Content)', 'education-zone-pro' ),
        'priority' => 24,
        'capability' => 'edit_theme_options',
        'panel'     => 'education_zone_pro_typography_section'
    ) );
    
    /** H2 Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_h2_font',
    	'label'       => __( 'H2 Font', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_h2_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );
    
    /** H2 Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h2_font_size',
        'label'    => __( 'H2 Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h2_section',
        'default'  => '29',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 60,
                        'step' => 1,
                    )
    ) );
    
    /** H2 Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h2_line_height',
        'label'    => __( 'H2 Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h2_section',
        'default'  => '32',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 30,
                        'max'  => 70,
                        'step' => 1,
                    )
    ) );
    
    /** H2 Color */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h2_color',
        'label'    => __( 'H2 Color', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h2_section',
        'type'     => 'color',
        'default'  => '#393939',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography_h2' );