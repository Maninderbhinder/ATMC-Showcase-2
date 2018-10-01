<?php
/**
 * Header Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_header_layout( ) {
    
    Kirki::add_section( 'education_zone_pro_header_layout_setting', array(
        'title'      => __( 'Layout Settings', 'education-zone-pro' ),
        'priority'   => 30,
        'panel'      => 'education_zone_pro_header_setting',
    ) );
    
    /** Header Layout */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Header Layout', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose the layout of header for your site.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_header_layout_setting',
        'settings' => 'education_zone_pro_header_layout',
        'type'     => 'radio-image',
        'default'  => 'one',
        'choices'  => array(
            'one'    => get_template_directory_uri() . '/images/header-layout1.png',
            'two'    => get_template_directory_uri() . '/images/header-layout2.png',
            'three'  => get_template_directory_uri() . '/images/header-layout3.png',
            'four'   => get_template_directory_uri() . '/images/header-layout4.png',
            'five'   => get_template_directory_uri() . '/images/header-layout5.png',
            'six'    => get_template_directory_uri() . '/images/header-layout6.png',
        )
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_header_layout' );