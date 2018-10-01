<?php
/**
 * Social Options
 *
 * @package education_zone_pro
 */
 
function education_zone_pro_customize_register_social( ) {
    
    /** Social Settings */
    Kirki::add_panel( 'education_zone_pro_social_settings', array(
        'title'      => __( 'Social Settings', 'education-zone-pro' ),
        'priority'   => 32,
        'capability' => 'edit_theme_options',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_social' );