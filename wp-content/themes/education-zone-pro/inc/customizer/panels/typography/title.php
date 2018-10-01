<?php
/**
 * Home Typography Options
 *
 * @package education_zone_pro
 */

function education_zone_pro_customize_register_typography_home( ) {

    /** Home Page Section Title Settings */
    Kirki::add_section( 'education_zone_pro_hps_title_section', array(
        'title'      => __( 'Title Settings', 'education-zone-pro' ),
        'priority'   => 11,
        'capability' => 'edit_theme_options',
        'panel'      => 'education_zone_pro_typography_section'
    ) );
    
    /** Home Page Section Title Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_hps_title_font',
    	'label'       => __( 'Title Font', 'education-zone-pro' ),
        'tooltip'     => __( 'Setting for the Section Title of Home Page Section', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_hps_title_section',
    	'default'     => array(
    		'font-family' => 'Lato',
    		'variant'     => '700',
    	),
    ) );
    
    /** Home Page Section Title Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_hps_title_font_size',
        'label'    => __( 'Home Page Section Title Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_hps_title_section',
        'default'  => '38',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 60,
                        'step' => 1,
                    )
    ) );
    
    /** Home Page Section Title Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_hps_title_line_height',
        'label'    => __( 'Home Page Section Title Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_hps_title_section',
        'default'  => '42',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 70,
                        'step' => 1,
                    )
    ) );
        
}
add_action( 'init', 'education_zone_pro_customize_register_typography_home' );