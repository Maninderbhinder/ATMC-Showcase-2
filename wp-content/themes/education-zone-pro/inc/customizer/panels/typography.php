<?php
/**
 * Typography Options 
 *
 * @package Education_zone_pro
 */

function education_zone_pro_customize_register_typography( ) {
    
    Kirki::add_panel( 'education_zone_pro_typography_section', array(
        'title'          => __( 'Typography Settings', 'education-zone-pro' ),
        'priority'       => 33,
        'capability'     => 'edit_theme_options',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography' );