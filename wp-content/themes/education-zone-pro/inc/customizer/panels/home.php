<?php
/**
 * Home Page Options
 *
 * @package education_zone_pro
 */

function education_zone_pro_customize_register_home( ) {

    /** Home Page Settings */
    Kirki::add_panel( 'education_zone_pro_home_page_settings', array(
        'priority'    => 24,
        'capability'  => 'edit_theme_options',
        'title'       => __( 'Home Page Settings', 'education-zone-pro' ),
        'description' => __( 'Customize Home Page Settings', 'education-zone-pro' ),
    ) );   
    
}
add_action( 'init', 'education_zone_pro_customize_register_home' );