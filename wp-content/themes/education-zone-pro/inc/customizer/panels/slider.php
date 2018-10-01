<?php
/**
 * Slider Options
 *
 * @package education_zone_pro
 */

function education_zone_pro_customize_register_slider( ) {
    
    Kirki::add_panel( 'education_zone_pro_slider_settings', array(
        'title'          => __( 'Slider / Banner Settings', 'education-zone-pro' ),
        'priority'       => 23,
        'capability'     => 'edit_theme_options',
    ) );
        
}
add_action( 'init', 'education_zone_pro_customize_register_slider' );