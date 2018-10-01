<?php
/**
 * Header Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_header( ) {
    
    Kirki::add_panel( 'education_zone_pro_header_setting', array(
        'title'      => __( 'Header Settings', 'education-zone-pro' ),
        'priority'   => 21,
        'capability' => 'edit_theme_options',
    ) );
    
    
}
add_action( 'init', 'education_zone_pro_customize_register_header' );