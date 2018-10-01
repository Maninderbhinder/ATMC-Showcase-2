<?php
/**
 * H5 Typography Options
 *
 * @package Benevolent
 */

function education_zone_pro_customize_register_typography_h5( ) {
    
    /** H5 Typography Settings */
    Kirki::add_section( 'education_zone_pro_h5_section', array(
        'title' => __( 'H5 Settings (Content)', 'education-zone-pro' ),
        'priority' => 27,
        'capability' => 'edit_theme_options',
        'panel'     => 'education_zone_pro_typography_section'
    ) );
    
    /** H5 Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_h5_font',
    	'label'       => __( 'H5 Font', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_h5_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );
    
    /** H5 Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h5_font_size',
        'label'    => __( 'H5 Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h5_section',
        'default'  => '19',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 30,
                        'step' => 1,
                    )
    ) );
    
    /** H5 Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h5_line_height',
        'label'    => __( 'H5 Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h5_section',
        'default'  => '22',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 35,
                        'step' => 1,
                    )
    ) );
    
    /** H5 Color */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_h5_color',
        'label'    => __( 'H5 Color', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_h5_section',
        'type'     => 'color',
        'default'  => '#393939',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography_h5' );